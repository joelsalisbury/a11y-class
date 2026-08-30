<x-layouts.app title="Join Your Team">
    <div class="mx-auto max-w-xl text-center">
        <x-meta-label>Day 1</x-meta-label>

        <h1 class="mt-4 text-3xl font-semibold tracking-tight text-ink md:text-4xl">
            Join Your Team
        </h1>

        <p class="mt-4 text-lg leading-8 text-ink-muted">
            Scan this code with your phone.
        </p>

        <div class="mt-8">
            @if ($qrSvg)
                <div class="qr-card">
                    {!! $qrSvg !!}
                </div>
            @else
                <div class="panel">
                    <p class="text-ink-muted">
                        No classroom join code is configured yet. Set <code class="font-mono text-sm">COURSE_JOIN_CODE</code> in the environment to enable joining.
                    </p>
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
