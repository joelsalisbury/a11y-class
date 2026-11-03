@props(['title', 'active' => '', 'team' => null, 'guided' => false, 'count' => 0])
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="robots" content="noindex, nofollow"><title>{{ $title }} | Course Selection</title>@vite(['resources/css/coursepath.css', 'resources/js/coursepath.js'])</head>
<body @class(['cp-guided' => $guided])>
<a href="#main" class="cp-skip">Skip to content</a>
<div class="cp-simulation"><div class="cp-shell flex flex-wrap justify-between gap-2"><span>DMD 3998 · Fictional academic system · No real registration</span><a href="{{ route('final-project') }}">Final Project Assignment</a></div></div>
<header class="cp-header"><div class="cp-shell cp-header-row"><a class="cp-application-title" href="{{ route('coursepath.welcome') }}">Course Selection<small>Spring 2027</small></a><nav aria-label="Main"><a href="{{ route('coursepath.welcome') }}" @if($active === 'welcome') aria-current="page" @endif>Requirements</a><a href="{{ route('coursepath.catalog') }}" @if($active === 'catalog') aria-current="page" @endif>Course Search</a><a href="{{ route('coursepath.plan') }}" @if($active === 'plan') aria-current="page" @endif>My Schedule <span class="cp-count" data-plan-count>{{ $count }}</span></a></nav></div></header>
@if($team)<div class="cp-path-strip"><div class="cp-shell"><span><strong>Selected program:</strong> {{ \App\Support\CoursePath::paths()[$team]['name'] }} — {{ \App\Support\CoursePath::paths()[$team]['title'] }}</span><a href="{{ route('coursepath.welcome') }}#choose-path">Change program</a></div></div>@endif
<main id="main" class="cp-shell" tabindex="-1">@if(session('notice'))<div class="cp-notice" role="status">{{ session('notice') }}</div>@endif{{ $slot }}</main>
<div class="cp-toast" data-toast hidden @if($guided) role="status" @endif></div>
<footer class="cp-footer"><div class="cp-shell"><p>Fictional course-selection exercise for DMD 3998. All meeting times are Eastern.</p></div></footer>
</body></html>
