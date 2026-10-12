@props(['title', 'returnHref', 'returnLabel'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root { color-scheme: light; }
        body { margin: 0; background: #f8fafc; color: #0f172a; font-family: 'Instrument Sans', sans-serif; line-height: 1.6; }
        .demo-shell { max-width: 920px; margin: auto; padding: 2rem 1.25rem 4rem; }
        h1 { font-size: clamp(2rem, 4vw, 2.8rem); line-height: 1.2; font-weight: 700; margin: 1rem 0; }
        h2 { font-size: 1.5rem; font-weight: 650; margin: 0 0 1rem; }
        h3 { font-size: 1.1rem; font-weight: 650; margin: .5rem 0; }
        h4 { font-weight: 650; }
        p { margin: .75rem 0; }
        a { color: #075985; text-decoration: underline; text-underline-offset: .2em; }
        button { background: #0f172a; color: white; border: 2px solid #0f172a; border-radius: .4rem; padding: .6rem 1rem; font-weight: 600; cursor: pointer; }
        button.secondary { background: white; color: #0f172a; }
        button:disabled { background: #e2e8f0; color: #475569; cursor: default; }
        :focus-visible { outline: 3px solid #0369a1; outline-offset: 4px; }
        .panel { border: 1px solid #cbd5e1; border-radius: 1rem; background: white; padding: 1.5rem; margin-top: 2rem; }
        .comparison { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 260px), 1fr)); gap: 1.5rem; }
        .field { margin: 1rem 0; }
        label, legend { font-weight: 600; }
        label:not(.inline-label) { display: block; margin-bottom: .35rem; }
        input:not([type=checkbox]):not([type=radio]), select, textarea { display: block; width: 100%; max-width: 100%; border: 1px solid #64748b; border-radius: .35rem; padding: .6rem; background: white; color: #0f172a; font: inherit; }
        input[type=checkbox], input[type=radio] { accent-color: #075985; width: 1.1rem; height: 1.1rem; }
        .actions { display: flex; flex-wrap: wrap; gap: .75rem; margin-top: 1rem; }
        .status { border-left: 3px solid #0369a1; padding-left: .75rem; min-height: 1.6em; }
        .muted { color: #475569; font-size: .95rem; }
        ul, ol { padding-left: 1.5rem; }
        li { margin: .35rem 0; }
        pre { white-space: pre-wrap; overflow-wrap: anywhere; background: #f1f5f9; padding: 1rem; border-radius: .4rem; font-size: .9rem; }
        [hidden] { display: none !important; }
        .skip-link { position: absolute; left: 1rem; top: -10rem; background: white; padding: .5rem; }
        .skip-link:focus { top: .5rem; }
        @media (prefers-reduced-motion: reduce) { html { scroll-behavior: auto; } }
    </style>
</head>
<body>
    <a class="skip-link" href="#demo-main">Skip to content</a>
    <main id="demo-main" class="demo-shell">
        <a href="{{ $returnHref }}">{{ $returnLabel }}</a>
        {{ $slot }}
    </main>
</body>
</html>
