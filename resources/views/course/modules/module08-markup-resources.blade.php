<section id="good-markup-resources" class="course-section module-anchor">
    <x-section-heading title="Good Markup Resources" />
    <p class="course-copy">{{ $module['resource_intro'] }}</p>
    <ul class="mt-4 space-y-4">
        @foreach ($module['resources'] as $resource)
            <li>
                <x-resource-link :href="$resource['href']" :meta="$resource['meta']">{{ $resource['label'] }}</x-resource-link>
            </li>
        @endforeach
    </ul>
</section>
