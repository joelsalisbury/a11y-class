<x-layouts.app title="Interaction Lab">
    <div class="module-shell">
        <x-course.module-navigation
            :module="\App\Support\Course::module(4)"
            currentPage="lab"
            :classWorkHref="route('modules.show', ['module' => 4]).'#module-class-work'"
        />

        <div class="module-main">
            <x-page-heading
                label="Module 04 · Interaction Lab"
                title="Interaction Lab"
                subtitle="Three controlled experiences for Challenge 04"
            />

            <div class="mt-8 max-w-3xl course-copy">
                <p>Each experience below has a task to complete. Use it normally first. Then try another way.</p>
            </div>

            <div class="mt-10 grid gap-5 lg:grid-cols-3">
                <x-panel class="flex h-full flex-col">
                    <x-team-identity team="Cyan Triangle" shape="triangle" tone="cyan" :showShapeLabel="false" />
                    <h2 class="mt-5 text-xl font-semibold text-ink">Course Finder</h2>
                    <p class="mt-3 flex-1 text-sm leading-7 text-ink-muted">Find a course that meets on Tuesday and add it to your shortlist.</p>
                    <a href="{{ route('experiences.module04.course-finder') }}" class="mt-5 inline-flex text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring rounded-sm">Open Course Finder →</a>
                </x-panel>

                <x-panel class="flex h-full flex-col">
                    <x-team-identity team="Amber Circle" shape="circle" tone="amber" :showShapeLabel="false" />
                    <h2 class="mt-5 text-xl font-semibold text-ink">Prioritize Your Tasks</h2>
                    <p class="mt-3 flex-1 text-sm leading-7 text-ink-muted">Put five tasks in priority order from highest to lowest.</p>
                    <a href="{{ route('experiences.module04.task-prioritizer') }}" class="mt-5 inline-flex text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring rounded-sm">Open Prioritize Your Tasks →</a>
                </x-panel>

                <x-panel class="flex h-full flex-col">
                    <x-team-identity team="Violet Square" shape="square" tone="violet" :showShapeLabel="false" />
                    <h2 class="mt-5 text-xl font-semibold text-ink">Find an Event</h2>
                    <p class="mt-3 flex-1 text-sm leading-7 text-ink-muted">Find the Accessibility Workshop and determine where and when it is happening.</p>
                    <a href="{{ route('experiences.module04.event-browser') }}" class="mt-5 inline-flex text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring rounded-sm">Open Find an Event →</a>
                </x-panel>
            </div>
        </div>
    </div>
</x-layouts.app>
