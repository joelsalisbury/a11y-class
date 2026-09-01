<x-layouts.app title="Modules">
    <x-page-heading
        label="Semester Atlas"
        title="Course Modules"
        subtitle="Each module centers on a different accessibility problem, building toward a more complete way to evaluate and design digital experiences."
    />

    <div class="mt-10 grid gap-5 md:grid-cols-2 xl:grid-cols-3">
        @foreach ($modules as $module)
            <x-module-card
                :module="$module['number']"
                :title="$module['title']"
                :status="$module['status']"
                :href="route('modules.show', $module['number'])"
                :summary="$module['central_question'] ?? $module['summary'] ?? null"
            />
        @endforeach
    </div>
</x-layouts.app>
