<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="theme-dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? 'DMD 3998' }} | DMD 3998</title>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-surface-1 text-ink antialiased">
        <a
            href="#main-content"
            class="skip-link focus-visible:ring-accent-cyan"
        >
            Skip to main content
        </a>

        <div class="site-grid">
            <header class="border-b border-subtle bg-surface-1/95 backdrop-blur" aria-label="Site header">
                <div class="shell flex items-center justify-between gap-6 py-5">
                    <div>
                        <p class="meta-label">DMD 3998</p>
                        <a href="{{ route('today') }}" class="site-title-link">Accessibility &amp; Inclusion in Interactive Media</a>
                    </div>

                    <nav aria-label="Primary" class="flex items-center gap-2">
                        <x-nav-link href="{{ route('today') }}" :active="request()->routeIs('today')">Today</x-nav-link>
                        <x-nav-link href="{{ route('modules.index') }}" :active="request()->routeIs('modules.*')">Modules</x-nav-link>
                        <x-nav-link href="{{ route('field-guide') }}" :active="request()->routeIs('field-guide')">Field Guide</x-nav-link>
                        <x-nav-link href="{{ route('syllabus') }}" :active="request()->routeIs('syllabus')">Syllabus</x-nav-link>
                    </nav>
                </div>
            </header>

            <main id="main-content" class="shell py-10 md:py-14">
                {{ $slot }}
            </main>

            <footer class="border-t border-subtle">
                <div class="shell flex flex-col gap-3 py-6 text-sm text-ink-muted md:flex-row md:items-center md:justify-between">
                    <p>Course field guide and studio headquarters for DMD 3998.</p>
                    <p>Grades, quizzes, and formal LMS workflows remain in HuskyCT.</p>
                </div>
            </footer>
        </div>
    </body>
</html>
