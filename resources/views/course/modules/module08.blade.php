<x-layouts.app title="Module 08">
    <div class="module-shell">
        <x-course.module-navigation :module="$module" currentPage="overview" :resourcesHref="route('modules.show', 8).'#good-markup-resources'" />
        <div class="module-main">
            <x-page-heading label="Module 08" :title="$module['title']" :subtitle="$module['central_question']" />
            <div class="course-measure course-flow">
                <div class="course-copy">
                    @foreach ($module['introduction'] as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                    <p><a href="{{ route('modules.session', ['module' => 8, 'session' => 16]) }}">Session 16: Practice and Studio</a></p>
                    <p>{{ $module['sessions'][16]['overview'] }}</p>
                </div>
                <section class="course-section">
                    <x-section-heading title="Challenge 08: Build It Right" />
                    <div class="course-copy">
                        <p class="course-emphasis">{{ $module['challenge']['metadata'] }}</p>
                        <p>{{ $module['challenge']['summary'] }}</p>
                        <p class="course-emphasis">{{ $module['challenge']['due'] }}</p>
                        <p><a href="{{ route('modules.challenge', 8) }}">Open Challenge 08 →</a></p>
                    </div>
                </section>
                @include('course.modules.module08-markup-resources')
                <section class="course-section">
                    <x-section-heading title="Quiz 2" />
                    <div class="course-copy">
                        <p class="course-emphasis">{{ $module['quiz']['date'] }}</p>
                        <p>{{ $module['quiz']['description'] }}</p>
                    </div>
                </section>
                <section class="course-section">
                    <x-section-heading title="Final Project" />
                    <p class="course-emphasis">{{ $module['final_project_note'] }}</p>
                </section>
            </div>
            <x-course.module-pagination :module="$module" currentPage="overview" />
        </div>
    </div>
</x-layouts.app>
