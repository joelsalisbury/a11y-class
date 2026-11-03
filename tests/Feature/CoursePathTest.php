<?php

use App\Support\CoursePath;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

beforeEach(function () {
    $this->withCookie(config('session.cookie'), session()->getId());
});

function coursePathExamples(): array
{
    return [
        'cyan-triangle' => [
            ['des-1100', 'des-2100', 'med-1200', 'data-1100', 'writ-1200'],
            ['des-1100', 'des-2100', 'med-1200', 'data-1100', 'phil-1300'],
            ['des-1100', 'art-1010', 'med-1200', 'data-1100', 'hist-1400'],
            ['des-1100', 'des-2100', 'med-1200', 'data-1100', 'med-2400'],
            ['des-1100', 'des-2100', 'med-1200', 'cs-2200', 'bus-1500'],
        ],
        'amber-circle' => [
            ['cs-1100', 'engr-1100', 'cs-2100', 'data-1100', 'writ-1200'],
            ['cs-1100', 'engr-1100', 'cs-2100', 'data-1100', 'phil-1300'],
            ['cs-1100', 'engr-1100', 'cs-2100', 'data-1100', 'hist-1400'],
            ['cs-1100', 'engr-1100', 'cs-2100', 'data-1100', 'med-2400'],
            ['cs-1100', 'cs-2200', 'cs-2100', 'data-1100', 'art-1010'],
        ],
        'violet-square' => [
            ['comm-1100', 'soc-1100', 'comm-2100', 'psy-1100', 'data-2200'],
            ['comm-1100', 'soc-1100', 'comm-2100', 'psy-1100', 'math-2100'],
            ['comm-1100', 'soc-1100', 'comm-2100', 'psy-1100', 'cs-2200'],
            ['comm-1100', 'soc-1100', 'comm-2100', 'data-1100', 'writ-1200'],
            ['comm-1100', 'soc-1100', 'comm-2100', 'data-1100', 'phil-1300'],
        ],
    ];
}

function coursePathPlan(array $courses): array
{
    $plan = [];
    foreach ($courses as $entry) {
        [$slug, $section] = array_pad(explode(':', $entry), 2, '01');
        $plan[$slug] = $slug.'-'.$section;
    }

    return $plan;
}

function coursePathStudent(array $overrides = []): array
{
    return array_replace(['name' => 'Avery North', 'email' => 'avery@example.test', 'year' => 'Second year', 'major' => 'Exploratory Studies', 'explanation' => 'These courses balance my interests and leave time to develop an independent project.', 'acknowledge' => '1'], $overrides);
}

test('the authored catalog has coherent courses sections and scheduling metadata', function () {
    $catalog = CoursePath::catalog();
    expect($catalog)->toHaveCount(40);
    expect(array_sum(array_map(fn ($course) => count($course['sections']), $catalog)))->toBe(54);
    $ids = [];
    foreach ($catalog as $slug => $course) {
        expect($course['credits'])->toBeIn([2, 3, 4]);
        expect($course['description'])->not->toBeEmpty();
        foreach ($course['prerequisites'] as $code) {
            expect(in_array($code, array_column($catalog, 'code'), true) || $code === 'MATH 1010')->toBeTrue();
        }
        foreach ($course['sections'] as $section) {
            expect($section['id'])->toStartWith($slug.'-');
            expect($section['start'])->toBeLessThan($section['end']);
            expect($section['seats'])->toBeGreaterThanOrEqual(0)->toBeLessThanOrEqual($section['capacity']);
            expect(array_diff($section['days'], ['M', 'T', 'W', 'R', 'F']))->toBeEmpty();
            expect($section['instructor'])->not->toBeEmpty();
            $ids[] = $section['id'];
        }
    }
    expect(array_unique($ids))->toHaveCount(54);
});

test('each path has five distinct valid schedules with balanced credits and choice', function (string $team) {
    $examples = coursePathExamples()[$team];
    expect($examples)->toHaveCount(5);
    $fingerprints = [];
    foreach ($examples as $courses) {
        $plan = coursePathPlan($courses);
        $result = CoursePath::check($team, $plan);
        expect($result['valid'])->toBeTrue();
        expect($result['rows'])->toHaveCount(5);
        expect($result['credits'])->toBeGreaterThanOrEqual(15)->toBeLessThanOrEqual(16);
        expect($result['conflicts'])->toBeEmpty();
        expect($result['problems'])->toBeEmpty();
        $fingerprints[] = json_encode($plan);
    }
    expect(array_unique($fingerprints))->toHaveCount(5);
})->with(['cyan-triangle', 'amber-circle', 'violet-square']);

test('all application pages render and private or obsolete product paths are absent', function () {
    $this->get('/coursepath')->assertOk()->assertSee('Cyan Triangle')->assertSee('Amber Circle')->assertSee('Violet Square');
    $this->get('/coursepath/catalog')->assertRedirect('/coursepath');
    $this->get('/final-project')->assertOk()->assertSee('Make It Better: Course Selection Accessibility Case Study')->assertSee('30%')->assertSee('25')->assertSee('100')->assertDontSee('StudioWorks')->assertDontSee('coursepath-inventory');
    $this->post('/coursepath/team', ['team' => 'cyan-triangle'])->assertRedirect('/coursepath/catalog');
    $this->get('/coursepath/catalog')->assertOk()->assertViewHas('courses', fn ($courses) => count($courses) === 40);
    foreach (array_keys(CoursePath::catalog()) as $slug) {
        $this->get('/coursepath/courses/'.$slug)->assertOk();
    }
    $this->get('/coursepath/plan')->assertOk();
    foreach (['/studioworks', '/studioworks/spaces', '/studioworks/reserve/1', '/studioworks/my-reservation', '/coursepath/courses/missing', '/docs/instructor/coursepath-inventory.md', '/instructor/coursepath-inventory', '/resources/coursepath/catalog.php'] as $url) {
        $this->get($url)->assertNotFound();
    }
});

test('catalog search filters days availability and sorting return correct results', function () {
    $this->withSession(['coursepath.team' => 'amber-circle']);
    $this->get('/coursepath/catalog?q=visualization')->assertOk()->assertViewHas('courses', fn ($courses) => array_keys($courses) === ['data-2200']);
    $this->get('/coursepath/catalog?department=Computer+Science&level=2000&day[]=M')->assertOk()->assertViewHas('courses', fn ($courses) => array_keys($courses) === ['cs-2100', 'cs-2200']);
    $this->get('/coursepath/catalog?available=open&day[]=T')->assertOk()->assertViewHas('courses', fn ($courses) => ! isset($courses['engr-2150']));
    $this->get('/coursepath/catalog?available=eligible&designation=writing')->assertOk()->assertViewHas('courses', function ($courses) {
        return count($courses) > 0 && ! isset($courses['des-2300'], $courses['comm-3100']) && ! isset($courses['art-2050']);
    });
    $this->get('/coursepath/catalog?sort=credits')->assertOk()->assertViewHas('courses', fn ($courses) => array_values($courses)[0]['credits'] === 2);
    $this->get('/coursepath/catalog?q=nonexistent')->assertOk()->assertSee('No courses match.')->assertViewHas('courses', []);
    $this->get('/coursepath/catalog?q=%3Cscript%3Ebad%3C%2Fscript%3E')->assertOk()->assertDontSee('<script>bad</script>', false)->assertSee('&lt;script&gt;', false);
    $this->get('/coursepath/catalog?day[]=X')->assertSessionHasErrors('day.0');
    $this->get('/coursepath/catalog?sort=invalid')->assertSessionHasErrors('sort');
    $this->get('/coursepath/catalog?q=data', ['Accept' => 'application/json'])->assertOk()->assertSee('Data Visualization')->assertDontSee('<html', false);
});

test('standard and supported pages expose their intended course accessibility variants', function () {
    $this->withSession(['coursepath.team' => 'cyan-triangle']);
    $this->get('/coursepath/catalog')
        ->assertOk()
        ->assertSee('aria-label="Find people"', false)
        ->assertSee('for="department-label">Department', false);
    $this->get('/coursepath/courses/des-1100')
        ->assertOk()
        ->assertSee('<h4 class="cp-section-title">What you’ll learn</h4>', false)
        ->assertSee('alt=""', false);

    $url = URL::temporarySignedRoute('coursepath.guided', now()->addMinutes(10));
    $this->get($url)->assertRedirect('/coursepath');
    $this->get('/coursepath/catalog')
        ->assertOk()
        ->assertSee('aria-label="Search catalog"', false)
        ->assertSee('for="department">Department', false)
        ->assertDontSee('Find people');
    $this->get('/coursepath/courses/des-1100')
        ->assertOk()
        ->assertSee('<h2>What you’ll learn</h2>', false)
        ->assertSee('alt="Plan for approximately 6 hours of independent study each week for this 3-credit course."', false);
});

test('adding a course returns updated requirements and its removal action', function () {
    $this->withSession(['coursepath.team' => 'cyan-triangle']);

    $response = $this->post('/coursepath/plan', [
        'course' => 'des-1100',
        'section' => 'des-1100-01',
    ], ['Accept' => 'application/json']);

    $response->assertOk()->assertJsonPath('count', 1)->assertSessionHas('coursepath.plan.des-1100', 'des-1100-01');
    expect($response->json('checklist'))->toContain('1 / 5', '3 / 15');
    expect($response->json('removeAction'))->toContain('/coursepath/plan/des-1100', 'Remove this course');
});

test('adding changing sections removing and rejecting unavailable courses preserves the working plan', function () {
    $this->withSession(['coursepath.team' => 'cyan-triangle']);
    $this->post('/coursepath/plan', ['course' => 'des-1100', 'section' => 'des-1100-01'])->assertRedirect('/coursepath/plan')->assertSessionHas('coursepath.plan.des-1100', 'des-1100-01');
    $this->post('/coursepath/plan', ['course' => 'des-1100', 'section' => 'des-1100-02'])->assertSessionHas('coursepath.plan.des-1100', 'des-1100-02');
    $this->get('/coursepath/plan')->assertOk()->assertSee('Section 02');
    $this->post('/coursepath/plan', ['course' => 'art-2050', 'section' => 'art-2050-01'])->assertSessionHasErrors(['selection' => 'This section is full. Choose another section.'])->assertSessionMissing('coursepath.plan.art-2050');
    $this->post('/coursepath/plan', ['course' => 'des-2300', 'section' => 'des-2300-01'])->assertSessionHasErrors('selection')->assertSessionMissing('coursepath.plan.des-2300');
    $this->post('/coursepath/plan', ['course' => 'data-3100', 'section' => 'data-3100-01'])->assertSessionHasErrors(['selection' => 'Missing prerequisite: DATA 2200.'])->assertSessionMissing('coursepath.plan.data-3100');
    $this->post('/coursepath/plan', ['course' => 'des-1100', 'section' => 'cs-1100-01'])->assertSessionHasErrors(['selection' => 'Choose a listed section for this course.']);
    $this->delete('/coursepath/plan/des-1100')->assertSessionHas('coursepath.plan', []);
});

test('async addition and removal update server state and return replacement plan content', function () {
    $this->withSession(['coursepath.team' => 'cyan-triangle']);
    $this->postJson('/coursepath/plan', ['course' => 'des-1100', 'section' => 'des-1100-01'])->assertOk()->assertJsonPath('count', 1)->assertSessionHas('coursepath.plan.des-1100', 'des-1100-01');
    $this->postJson('/coursepath/plan', ['course' => 'art-2050', 'section' => 'art-2050-01'])->assertUnprocessable()->assertJsonPath('message', 'This section is full. Choose another section.');
    $this->deleteJson('/coursepath/plan/des-1100')->assertOk()->assertJsonPath('count', 0)->assertSessionHas('coursepath.plan', []);
});

test('conflicts credits and path checks reject invalid proposals without accepting them', function () {
    $plan = coursePathPlan(['des-1100', 'cs-1100', 'art-2600', 'engr-2500', 'psy-1100']);
    $result = CoursePath::check('cyan-triangle', $plan);
    expect($result['credits'])->toBe(13);
    expect($result['valid'])->toBeFalse();
    expect($result['conflicts'])->toHaveCount(1);
    $this->withSession(['coursepath.team' => 'cyan-triangle', 'coursepath.plan' => $plan])->get('/coursepath/student')->assertRedirect('/coursepath/plan')->assertSessionHasErrors('schedule');
    $this->post('/coursepath/submit', ['confirm' => 1])->assertRedirect('/coursepath/plan')->assertSessionMissing('coursepath.submitted');
    $this->get('/coursepath/plan')->assertOk()->assertSee('overlaps')->assertSee('13 credits');
});

test('changing a section resolves an overlap and a sixth distinct course is refused', function () {
    $plan = coursePathPlan(['des-1100', 'cs-1100', 'med-1200', 'data-1100', 'writ-1200']);
    expect(CoursePath::check('amber-circle', $plan)['conflicts'])->toHaveCount(1);
    $this->withSession(['coursepath.team' => 'amber-circle', 'coursepath.plan' => $plan])->post('/coursepath/plan', ['course' => 'des-1100', 'section' => 'des-1100-02'])->assertRedirect('/coursepath/plan');
    expect(CoursePath::check('amber-circle', session('coursepath.plan'))['conflicts'])->toBeEmpty();
    $this->post('/coursepath/plan', ['course' => 'phil-1300', 'section' => 'phil-1300-01'])->assertSessionHasErrors('selection')->assertSessionMissing('coursepath.plan.phil-1300');
});

test('touching meeting boundaries is allowed but intersecting shared-day times conflict', function () {
    $a = ['days' => ['M', 'W'], 'start' => 540, 'end' => 600];
    expect(CoursePath::overlap($a, ['days' => ['M'], 'start' => 600, 'end' => 660]))->toBeFalse();
    expect(CoursePath::overlap($a, ['days' => ['T'], 'start' => 550, 'end' => 590]))->toBeFalse();
    expect(CoursePath::overlap($a, ['days' => ['W'], 'start' => 599, 'end' => 660]))->toBeTrue();
});

test('student validation preserves entered data and rejects real email domains', function () {
    $plan = coursePathPlan(coursePathExamples()['cyan-triangle'][0]);
    $this->withSession(['coursepath.team' => 'cyan-triangle', 'coursepath.plan' => $plan])->post('/coursepath/student', [])->assertSessionHasErrors(['name', 'email', 'year', 'major', 'explanation', 'acknowledge']);
    $this->post('/coursepath/student', coursePathStudent(['email' => 'avery@university.edu']))->assertSessionHasErrors(['email' => 'Use a fictional address ending in @example.test.'])->assertSessionHasInput('name', 'Avery North')->assertSessionMissing('coursepath.student');
    $this->get('/coursepath/student')->assertOk()->assertSee('Avery North');
});

test('each path supports submission persistence accurate confirmation and revision', function (string $team) {
    Mail::fake();
    $this->post('/coursepath/team', ['team' => $team])->assertRedirect('/coursepath/catalog');
    $plan = coursePathPlan(coursePathExamples()[$team][0]);
    foreach ($plan as $slug => $section) {
        $this->post('/coursepath/plan', ['course' => $slug, 'section' => $section])->assertRedirect('/coursepath/plan');
    }
    $this->get('/coursepath/plan')->assertOk()->assertSee('15 credits')->assertSee('Continue to student information');
    $this->get('/coursepath/student')->assertOk()->assertSee('Review and Submit');
    $this->post('/coursepath/student', coursePathStudent())->assertRedirect('/coursepath/review');
    $this->get('/coursepath/review')->assertOk()->assertSee('Avery North')->assertSee('avery@example.test')->assertSee('Save Proposal')->assertSee('not the earlier acknowledgment about fictional details');
    $this->post('/coursepath/submit', ['confirm' => 1, 'email_confirmation' => 'wrong@example.test'])->assertSessionHasErrors('email_confirmation')->assertSessionMissing('coursepath.submitted');
    $this->post('/coursepath/submit', ['confirm' => 1, 'email_confirmation' => 'avery@example.test'])->assertRedirect('/coursepath/confirmation')->assertSessionHas('coursepath.submitted.reference', 'CP-2603-001')->assertSessionHas('coursepath.submitted.plan', $plan);
    $this->get('/coursepath/confirmation')->assertOk()->assertSee('Avery North')->assertSee('CP-2603-001')->assertSee('15 credits');
    $this->post('/coursepath/submit', ['confirm' => 1, 'email_confirmation' => 'avery@example.test'])->assertSessionHas('coursepath.submitted.revision', 1);
    $this->post('/coursepath/revise')->assertRedirect('/coursepath/plan')->assertSessionHas('coursepath.plan', $plan);
    $this->delete('/coursepath/plan/'.array_key_first($plan))->assertRedirect('/coursepath/plan')->assertSessionHas('coursepath.submitted.plan', $plan);
    $this->get('/coursepath/confirmation')->assertOk()->assertSee('5 courses');
    $this->post('/coursepath/submit', ['confirm' => 1, 'email_confirmation' => 'avery@example.test'])->assertRedirect('/coursepath/plan')->assertSessionHas('coursepath.submitted.revision', 1);
    Mail::assertNothingSent();
})->with(['cyan-triangle', 'amber-circle', 'violet-square']);

test('student content is escaped and changed proposals receive a new revision', function () {
    $plan = coursePathPlan(coursePathExamples()['cyan-triangle'][0]);
    $this->withSession(['coursepath.team' => 'cyan-triangle', 'coursepath.plan' => $plan])->post('/coursepath/student', coursePathStudent(['name' => '<script>alert(1)</script>', 'explanation' => 'A fictional rationale with <script>alert(2)</script> and enough characters.']))->assertRedirect('/coursepath/review');
    $this->get('/coursepath/review')->assertOk()->assertDontSee('<script>alert(', false)->assertSee('&lt;script&gt;', false);
    $this->post('/coursepath/submit', ['confirm' => 1, 'email_confirmation' => 'avery@example.test'])->assertSessionHas('coursepath.submitted.revision', 1);
    $this->post('/coursepath/student', coursePathStudent(['name' => 'Taylor North']))->assertRedirect('/coursepath/review');
    $this->post('/coursepath/submit', ['confirm' => 1, 'email_confirmation' => 'avery@example.test'])->assertSessionHas('coursepath.submitted.reference', 'CP-2603-002');
});

test('team changes reset working data while retaining the previous submitted snapshot', function () {
    $plan = coursePathPlan(coursePathExamples()['cyan-triangle'][0]);
    $snapshot = ['team' => 'cyan-triangle', 'plan' => $plan, 'student' => coursePathStudent(), 'revision' => 1, 'reference' => 'CP-2603-001'];
    $this->withSession(['coursepath.team' => 'cyan-triangle', 'coursepath.plan' => $plan, 'coursepath.student' => coursePathStudent(), 'coursepath.submitted' => $snapshot])->post('/coursepath/team', ['team' => 'cyan-triangle'])->assertSessionHas('coursepath.plan', $plan);
    $this->post('/coursepath/team', ['team' => 'violet-square'])->assertSessionHas('coursepath.team', 'violet-square')->assertSessionMissing('coursepath.plan')->assertSessionMissing('coursepath.student')->assertSessionHas('coursepath.submitted', $snapshot);
    $this->get('/coursepath/confirmation')->assertOk()->assertSee('Creative Practice');
    $this->post('/coursepath/team', ['team' => 'unknown'])->assertSessionHasErrors('team')->assertSessionHas('coursepath.team', 'violet-square');
});

test('an instructor signed entry is required for the supported workflow', function () {
    $this->get('/coursepath/guided-entry')->assertForbidden()->assertSessionMissing('coursepath.guided');
    $url = URL::temporarySignedRoute('coursepath.guided', now()->addMinutes(10));
    $this->get($url)->assertRedirect('/coursepath')->assertSessionHas('coursepath.guided', true);
    $this->get('/coursepath')->assertOk()->assertSee('Read the orientation');
    $plan = coursePathPlan(coursePathExamples()['amber-circle'][0]);
    $this->post('/coursepath/team', ['team' => 'amber-circle']);
    foreach ($plan as $slug => $section) {
        $this->post('/coursepath/plan', ['course' => $slug, 'section' => $section]);
    }
    $this->post('/coursepath/student', coursePathStudent())->assertRedirect('/coursepath/review');
    $this->get('/coursepath/student')->assertOk()->assertSee('Continue to review');
    $this->get('/coursepath/review')->assertOk()->assertDontSee('Enter your fictional email again')->assertSee('Submit Schedule');
    $this->post('/coursepath/submit', ['confirm' => 1])->assertRedirect('/coursepath/confirmation');
});

test('each path enforces its designation and breadth independently', function (string $team, array $courses, string $expected) {
    $result = CoursePath::check($team, coursePathPlan($courses));
    expect($result['valid'])->toBeFalse();
    expect($result['messages'])->toContain($expected);
    expect($result['conflicts'])->toBeEmpty();
})->with([
    'creative writing' => ['cyan-triangle', ['des-1100', 'des-2100', 'med-2400', 'data-1100', 'phil-1300'], 'One writing-intensive course'],
    'creative breadth' => ['cyan-triangle', ['des-1100', 'des-2100', 'med-1200', 'med-2400', 'des-2200'], 'One course outside Design, Media, and Art'],
    'technology quantitative' => ['amber-circle', ['cs-2100', 'engr-1100', 'cs-2200', 'des-1100', 'phil-1300'], 'One quantitative reasoning course'],
    'technology breadth' => ['amber-circle', ['cs-1100', 'engr-1100', 'cs-2100', 'data-1100', 'cs-2200'], 'One humanities or arts course'],
    'society writing' => ['violet-square', ['comm-1100', 'soc-1100', 'psy-1100', 'comm-2250', 'math-2100'], 'One writing-intensive course'],
    'society breadth' => ['violet-square', ['comm-1100', 'soc-1100', 'comm-2100', 'psy-1100', 'comm-2250'], 'One quantitative or technical course'],
]);

test('submission rechecks prerequisites and seats even for a forged working plan', function (string $slug) {
    $plan = coursePathPlan(['des-1100', 'des-2100', 'med-1200', 'data-1100', $slug]);
    $this->withSession(['coursepath.team' => 'cyan-triangle', 'coursepath.plan' => $plan, 'coursepath.student' => coursePathStudent()])->post('/coursepath/submit', ['confirm' => 1, 'email_confirmation' => 'avery@example.test'])->assertRedirect('/coursepath/plan')->assertSessionHasErrors('schedule')->assertSessionMissing('coursepath.submitted');
})->with(['des-2300', 'data-3100', 'art-2050']);

test('signed support links expire and cannot be changed into permanent public access', function () {
    $this->travelTo(new DateTimeImmutable('2026-11-03 10:00:00'));
    $url = URL::temporarySignedRoute('coursepath.guided', now()->addMinutes(10));
    $this->travel(11)->minutes();
    $this->get($url)->assertForbidden()->assertSessionMissing('coursepath.guided');
    $this->travelBack();
});
