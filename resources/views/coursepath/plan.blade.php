<x-coursepath.layout title="My Schedule" active="plan" :team="$team" :guided="$guided" :count="count($plan)">
<div class="cp-page-heading"><h1>My Schedule</h1><p>Review selected courses, credits, and requirements. Resolve schedule conflicts before continuing.</p></div>
@if($errors->any())<div class="cp-errors" role="alert">@foreach($errors->all() as $message)<p>{{ $message }}</p>@endforeach</div>@endif
@include('coursepath.partials.plan-content')
</x-coursepath.layout>
