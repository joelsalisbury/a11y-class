<x-layouts.app title="Modules">
    <x-page-heading
        label="Semester Atlas"
        title="Course Modules"
        subtitle="A studio-focused map of the semester. Modules are flexible instructional units — each may span any number of class meetings. Status is set manually by the instructor, not by calendar date."
    />

    <div class="mt-10 grid gap-5 md:grid-cols-2 xl:grid-cols-3">
        @foreach ($modules as $module)
            <x-module-card
                :module="$module['number']"
                :title="$module['title']"
                :status="$module['status']"
                :href="route('modules.show', $module['number'])"
                :summary="$module['summary'] ?? null"
            />
        @endforeach
    </div>
</x-layouts.app>
