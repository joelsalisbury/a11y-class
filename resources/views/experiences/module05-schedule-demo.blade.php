<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Workshop Schedule</title>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --page-bg: #f8fafc;
                --card-bg: #ffffff;
                --soft-bg: #f1f5f9;
                --border: #dfe7ef;
                --text: #0f172a;
                --muted: #475569;
                --accent: #1d4ed8;
                --accent-strong: #1e3a8a;
                --success: #166534;
                --success-soft: #dcfce7;
                --focus: #2563eb;
            }

            * { box-sizing: border-box; }

            body {
                margin: 0;
                font-family: 'Instrument Sans', sans-serif;
                background: var(--page-bg);
                color: var(--text);
            }

            .demo-shell {
                max-width: 760px;
                margin: 0 auto;
                padding: 2rem 1.25rem 4rem;
            }

            .page-card {
                background: var(--card-bg);
                border: 1px solid var(--border);
                border-radius: 18px;
                box-shadow: 0 12px 28px rgba(15, 23, 42, 0.04);
                padding: 1.5rem;
            }

            h1, h2, p {
                margin-top: 0;
            }

            .eyebrow {
                display: inline-block;
                margin: 0 0 0.75rem;
                border-radius: 9999px;
                background: var(--soft-bg);
                color: var(--muted);
                font-size: 0.72rem;
                letter-spacing: 0.12em;
                padding: 0.35rem 0.65rem;
                text-transform: uppercase;
            }

            .schedule {
                display: grid;
                gap: 0.9rem;
                margin-top: 1.25rem;
            }

            .schedule-item {
                display: flex;
                justify-content: space-between;
                gap: 1rem;
                border: 1px solid var(--border);
                border-radius: 12px;
                background: #f8fafc;
                padding: 0.9rem 1rem;
            }

            .schedule-item strong {
                display: block;
                margin-bottom: 0.2rem;
            }

            .schedule-item time {
                color: var(--muted);
                font-weight: 600;
            }

            .back-link {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                margin-top: 1.25rem;
                padding: 0.8rem 1rem;
                border-radius: 10px;
                border: 1px solid var(--border);
                background: var(--soft-bg);
                color: var(--text);
                text-decoration: none;
                font-weight: 600;
            }

            a:focus-visible,
            button:focus-visible {
                outline: 3px solid var(--focus);
                outline-offset: 3px;
            }
        </style>
    </head>
    <body>
        <main class="demo-shell">
            <article class="page-card" aria-labelledby="schedule-heading">
                <p class="eyebrow">Schedule</p>
                <h1 id="schedule-heading">Workshop schedule</h1>
                <p>Thursday sessions for the media and design practice track.</p>

                <div class="schedule" aria-label="Workshop schedule">
                    <div class="schedule-item">
                        <div>
                            <strong>Accessible Interfaces in Practice</strong>
                            <span>Digital Media Lab</span>
                        </div>
                        <time datetime="2026-10-08T13:00">1:00–2:15 PM</time>
                    </div>

                    <div class="schedule-item">
                        <div>
                            <strong>Designing for the Keyboard</strong>
                            <span>Studio 2</span>
                        </div>
                        <time datetime="2026-10-08T14:30">2:30–3:45 PM</time>
                    </div>

                    <div class="schedule-item">
                        <div>
                            <strong>Form Clarity Lab</strong>
                            <span>Learning Commons</span>
                        </div>
                        <time datetime="2026-10-08T15:00">3:00–4:15 PM</time>
                    </div>
                </div>

                <a class="back-link" href="/experiences/module-05/controls-demo">Back to controls demo</a>
            </article>
        </main>
    </body>
</html>
