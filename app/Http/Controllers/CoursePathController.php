<?php

namespace App\Http\Controllers;

use App\Support\CoursePath;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CoursePathController extends Controller
{
    private function context(Request $request): array
    {
        $team = $request->session()->get('coursepath.team');
        $plan = $request->session()->get('coursepath.plan', []);

        return ['team' => $team, 'path' => CoursePath::paths()[$team] ?? null, 'paths' => CoursePath::paths(), 'plan' => $plan, 'assessment' => $team ? CoursePath::check($team, $plan) : null, 'guided' => $request->session()->get('coursepath.guided', false)];
    }

    public function welcome(Request $request): View
    {
        return view('coursepath.welcome', $this->context($request));
    }

    public function team(Request $request): RedirectResponse
    {
        $data = $request->validate(['team' => ['required', Rule::in(array_keys(CoursePath::paths()))]]);
        if ($request->session()->get('coursepath.team') !== $data['team']) {
            $request->session()->forget(['coursepath.plan', 'coursepath.student']);
        }
        $request->session()->put('coursepath.team', $data['team']);

        return to_route('coursepath.catalog');
    }

    public function catalog(Request $request): View|RedirectResponse|Response
    {
        if (! $request->session()->has('coursepath.team')) {
            return to_route('coursepath.welcome');
        }
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:100'], 'department' => ['nullable', Rule::in(array_unique(array_column(CoursePath::catalog(), 'department')))],
            'level' => ['nullable', Rule::in(['1000', '2000', '3000'])], 'available' => ['nullable', Rule::in(['open', 'eligible'])],
            'day' => ['nullable', 'array'], 'day.*' => [Rule::in(['M', 'T', 'W', 'R', 'F'])], 'designation' => ['nullable', Rule::in(['writing', 'quantitative'])], 'sort' => ['nullable', Rule::in(['code', 'title', 'credits'])],
        ]);
        $courses = array_filter(CoursePath::catalog(), function (array $course) use ($filters): bool {
            $text = mb_strtolower(implode(' ', [$course['code'], $course['title'], $course['description'], $course['department']]));
            $matchingSections = array_filter($course['sections'], function (array $section) use ($filters): bool {
                return (empty($filters['available']) || $section['seats'] > 0)
                    && (empty($filters['day']) || count(array_diff($filters['day'], $section['days'])) === 0);
            });

            return (empty($filters['q']) || str_contains($text, mb_strtolower(trim($filters['q']))))
                && (empty($filters['department']) || $course['department'] === $filters['department'])
                && (empty($filters['level']) || $course['level'] === (int) $filters['level'])
                && ((empty($filters['available']) && empty($filters['day'])) || $matchingSections !== [])
                && (empty($filters['available']) || $filters['available'] !== 'eligible' || ! CoursePath::eligibility($course))
                && (empty($filters['designation']) || $course[$filters['designation']]);
        });
        $sort = $filters['sort'] ?? 'code';
        uasort($courses, fn (array $a, array $b) => ($a[$sort] <=> $b[$sort]) ?: strcmp($a['code'], $b['code']));
        $data = [...$this->context($request), 'courses' => $courses, 'filters' => $filters, 'departments' => array_unique(array_column(CoursePath::catalog(), 'department'))];
        if ($request->expectsJson()) {
            return response()->view('coursepath.partials.results', $data);
        }

        return view('coursepath.catalog', $data);
    }

    public function course(Request $request, string $course): View|RedirectResponse
    {
        if (! $request->session()->has('coursepath.team')) {
            return to_route('coursepath.welcome');
        }

        return view('coursepath.course', [...$this->context($request), 'course' => CoursePath::course($course)]);
    }

    public function plan(Request $request): View|RedirectResponse
    {
        if (! $request->session()->has('coursepath.team')) {
            return to_route('coursepath.welcome');
        }

        return view('coursepath.plan', $this->context($request));
    }

    public function add(Request $request): RedirectResponse|JsonResponse
    {
        if (! $request->session()->has('coursepath.team')) {
            return to_route('coursepath.welcome');
        }
        $data = $request->validate(['course' => ['required', Rule::in(array_keys(CoursePath::catalog()))], 'section' => ['required', 'string']]);
        $course = CoursePath::course($data['course']);
        $section = collect($course['sections'])->firstWhere('id', $data['section']);
        $plan = $request->session()->get('coursepath.plan', []);
        $reason = ! $section ? 'Choose a listed section for this course.' : ($section['seats'] === 0 ? 'This section is full. Choose another section.' : CoursePath::eligibility($course));
        if (! isset($plan[$data['course']]) && count($plan) >= 5) {
            $reason = 'Your schedule already has five courses. Remove one before adding another.';
        }
        if ($reason) {
            if ($request->expectsJson()) {
                return response()->json(['message' => $reason], 422);
            }

            return back()->withErrors(['selection' => $reason]);
        }
        $plan[$data['course']] = $data['section'];
        $request->session()->put('coursepath.plan', $plan);
        if ($request->expectsJson()) {
            $context = $this->context($request);

            return response()->json([
                'message' => $course['code'].' added to your schedule.',
                'count' => count($plan),
                'checklist' => view('coursepath.partials.plan-checklist', [
                    'assessment' => $context['assessment'],
                    'path' => $context['path'],
                    'guided' => $context['guided'],
                ])->render(),
                'removeAction' => view('coursepath.partials.remove-course', ['course' => $course])->render(),
            ]);
        }

        return to_route('coursepath.plan')->with('notice', $course['code'].' added to your schedule.');
    }

    public function remove(Request $request, string $course): RedirectResponse|JsonResponse
    {
        if (! $request->session()->has('coursepath.team')) {
            return to_route('coursepath.welcome');
        }
        CoursePath::course($course);
        $plan = $request->session()->get('coursepath.plan', []);
        unset($plan[$course]);
        $request->session()->put('coursepath.plan', $plan);
        if ($request->expectsJson()) {
            return response()->json(['html' => view('coursepath.partials.plan-content', $this->context($request))->render(), 'count' => count($plan)]);
        }

        return to_route('coursepath.plan')->with('notice', 'Course removed.');
    }

    private function checkSubmission(Request $request): ?RedirectResponse
    {
        if (! $request->session()->has('coursepath.team')) {
            return to_route('coursepath.welcome');
        }
        $assessment = CoursePath::check($request->session()->get('coursepath.team'), $request->session()->get('coursepath.plan', []));
        if (! $assessment['valid']) {
            return to_route('coursepath.plan')->withErrors(['schedule' => implode(' ', $assessment['messages'])]);
        }

        return null;
    }

    public function student(Request $request): View|RedirectResponse
    {
        if ($redirect = $this->checkSubmission($request)) {
            return $redirect;
        }

        return view('coursepath.student', [...$this->context($request), 'student' => $request->session()->get('coursepath.student', [])]);
    }

    public function saveStudent(Request $request): RedirectResponse
    {
        if ($redirect = $this->checkSubmission($request)) {
            return $redirect;
        }
        $input = $request->only(['name', 'email', 'year', 'major', 'explanation', 'acknowledge']);
        $validator = Validator::make($input, [
            'name' => ['required', 'string', 'min:2', 'max:80'], 'email' => ['required', 'email:rfc', 'max:120', 'regex:/^[^@\s]+@example\.test$/i'],
            'year' => ['required', Rule::in(['First year', 'Second year', 'Third year', 'Fourth year'])],
            'major' => ['required', Rule::in(['Design and Media', 'Computing and Engineering', 'Social Sciences', 'Exploratory Studies'])],
            'explanation' => ['required', 'string', 'min:30', 'max:600'], 'acknowledge' => ['accepted'],
        ], ['email.regex' => 'Use a fictional address ending in @example.test.', 'explanation.min' => 'Explain your selections in at least 30 characters.', 'acknowledge.accepted' => 'Acknowledge that this is a fictional planning exercise.']);
        if ($validator->fails()) {
            return to_route('coursepath.student')->withErrors($validator)->withInput($input);
        }
        $request->session()->put('coursepath.student', $validator->validated());

        return to_route('coursepath.review');
    }

    public function review(Request $request): View|RedirectResponse
    {
        if ($redirect = $this->checkSubmission($request)) {
            return $redirect;
        }
        if (! $request->session()->has('coursepath.student')) {
            return to_route('coursepath.student');
        }

        return view('coursepath.review', [...$this->context($request), 'student' => $request->session()->get('coursepath.student')]);
    }

    public function submit(Request $request): RedirectResponse
    {
        if ($redirect = $this->checkSubmission($request)) {
            return $redirect;
        }
        $student = $request->session()->get('coursepath.student');
        if (! $student) {
            return to_route('coursepath.student');
        }
        $request->validate(['confirm' => ['accepted'], 'email_confirmation' => $request->session()->get('coursepath.guided') ? ['nullable'] : ['required', Rule::in([$student['email']])]], ['email_confirmation.in' => 'Enter the same fictional email used in Student information.', 'confirm.accepted' => 'Confirm your plan before submitting.']);
        $previous = $request->session()->get('coursepath.submitted');
        $snapshot = ['team' => $request->session()->get('coursepath.team'), 'plan' => $request->session()->get('coursepath.plan'), 'student' => $student];
        $revision = $previous && array_intersect_key($previous, $snapshot) === $snapshot ? $previous['revision'] : ($previous['revision'] ?? 0) + 1;
        $request->session()->put('coursepath.submitted', [...$snapshot, 'revision' => $revision, 'reference' => 'CP-2603-'.str_pad((string) $revision, 3, '0', STR_PAD_LEFT)]);

        return to_route('coursepath.confirmation');
    }

    public function confirmation(Request $request): View|RedirectResponse
    {
        $submitted = $request->session()->get('coursepath.submitted');
        if (! $submitted) {
            return to_route('coursepath.plan');
        }

        return view('coursepath.confirmation', [...$this->context($request), 'submitted' => $submitted, 'path' => CoursePath::paths()[$submitted['team']], 'assessment' => CoursePath::check($submitted['team'], $submitted['plan'])]);
    }

    public function revise(Request $request): RedirectResponse
    {
        if ($submitted = $request->session()->get('coursepath.submitted')) {
            foreach (['team', 'plan', 'student'] as $key) {
                $request->session()->put('coursepath.'.$key, $submitted[$key]);
            }
        }

        return to_route('coursepath.plan');
    }

    public function guided(Request $request): RedirectResponse
    {
        $request->session()->put('coursepath.guided', true);

        return to_route('coursepath.welcome');
    }
}
