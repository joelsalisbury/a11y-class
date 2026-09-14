<x-layouts.app title="Media examples">
    <div class="mx-auto max-w-5xl space-y-8">
        <x-page-heading
            label="Class demonstration"
            title="Media and purpose"
            subtitle="The same media can do different jobs in different places. The key question is what it contributes in context."
        />

        <section class="rounded-xl border border-subtle bg-surface-2 p-5 md:p-6">
            <h2 class="text-2xl font-semibold text-ink">Example 1: Same photograph, different purpose</h2>
            <p class="mt-3 text-base leading-7 text-ink-muted">Should the text alternative be the same in all three places?</p>

            <div class="mt-6 grid gap-4 md:grid-cols-3">
                <article class="rounded-lg border border-subtle bg-surface-3 p-4">
                    <h3 class="text-lg font-semibold text-ink">Context A: Identification</h3>
                    <img src="/images/media-purpose-bike.jpg" alt="Bicyclists gathered at a trail event in a park" class="mt-3 h-52 w-full rounded-lg border border-subtle object-cover" />
                    <p class="mt-3 text-sm leading-7 text-ink-muted">The image helps identify the subject.</p>
                </article>

                <article class="rounded-lg border border-subtle bg-surface-3 p-4">
                    <h3 class="text-lg font-semibold text-ink">Context B: Story detail</h3>
                    <img src="/images/media-purpose-bike.jpg" alt="Bicyclists gathered at a trail event in a park with route signs and a trail junction" class="mt-3 h-52 w-full rounded-lg border border-subtle object-cover" />
                    <p class="mt-3 text-sm leading-7 text-ink-muted">A specific detail in the photo matters to the story.</p>
                </article>

                <article class="rounded-lg border border-subtle bg-surface-3 p-4">
                    <h3 class="text-lg font-semibold text-ink">Context C: Decorative atmosphere</h3>
                    <img src="/images/media-purpose-bike.jpg" alt="Bicyclists gathered at a trail event in a park" class="mt-3 h-52 w-full rounded-lg border border-subtle object-cover" />
                    <p class="mt-3 text-sm leading-7 text-ink-muted">The image is present for atmosphere and adds no information not already available in the text.</p>
                </article>
            </div>

            <details class="mt-6 rounded-lg border border-subtle bg-surface-3 p-4">
                <summary class="cursor-pointer font-medium text-ink focus-visible:focus-ring rounded-sm">Reveal the point</summary>
                <p class="mt-3 text-sm leading-7 text-ink-muted">The image did not change. Its purpose did. The appropriate alternative depends on what the image contributes in context.</p>
            </details>
        </section>

        <section class="rounded-xl border border-subtle bg-surface-2 p-5 md:p-6">
            <h2 class="text-2xl font-semibold text-ink">Example 2: Informative and decorative media</h2>
            <p class="mt-3 text-base leading-7 text-ink-muted">Does every image need to be described?</p>

            <div class="mt-6 grid gap-4 md:grid-cols-2">
                <article class="rounded-lg border border-subtle bg-surface-3 p-4">
                    <h3 class="text-lg font-semibold text-ink">Informative image</h3>
                    <img src="/images/media-purpose-lab.jpg" alt="Students working together in a science lab" class="mt-3 h-64 w-full rounded-lg border border-subtle object-cover" />
                    <p class="mt-3 text-sm leading-7 text-ink-muted">This image helps communicate that the project is active, collaborative, and hands-on.</p>
                </article>

                <article class="rounded-lg border border-subtle bg-surface-3 p-4">
                    <h3 class="text-lg font-semibold text-ink">Decorative image</h3>
                    <img src="/images/media-purpose-collab.jpg" alt="A group of students collaborating around a table" class="mt-3 h-64 w-full rounded-lg border border-subtle object-cover" />
                    <p class="mt-3 text-sm leading-7 text-ink-muted">This image is mostly atmosphere. It does not add information that the surrounding text does not already provide.</p>
                </article>
            </div>

            <details class="mt-6 rounded-lg border border-subtle bg-surface-3 p-4">
                <summary class="cursor-pointer font-medium text-ink focus-visible:focus-ring rounded-sm">Reveal the distinction</summary>
                <p class="mt-3 text-sm leading-7 text-ink-muted">Informative media may need an appropriate equivalent. Decorative media should generally stay out of the way unless it adds meaning the user needs.</p>
            </details>
        </section>

        <section class="rounded-xl border border-subtle bg-surface-2 p-5 md:p-6">
            <h2 class="text-2xl font-semibold text-ink">Example 3: Image with important text</h2>
            <p class="mt-3 text-base leading-7 text-ink-muted">If someone cannot see this graphic, what information still needs to be available?</p>

            <div class="mt-6 rounded-lg border border-subtle bg-surface-3 p-4">
                <svg viewBox="0 0 420 320" role="img" aria-labelledby="poster-title poster-desc" xmlns="http://www.w3.org/2000/svg" class="w-full rounded-lg border border-subtle bg-white">
                    <title id="poster-title">Campus public safety poster</title>
                    <desc id="poster-desc">A poster reading Public Safety and Public Trust, Text alerts improve rapid response, and Inclusive communication is part of the project design.</desc>
                    <rect width="420" height="320" fill="#eaf0f7"/>
                    <rect x="30" y="30" width="360" height="260" rx="18" fill="#ffffff" stroke="#6d7c96" stroke-width="4"/>
                    <text x="50" y="90" fill="#2a3d5f" font-size="28" font-family="sans-serif" font-weight="700">PUBLIC SAFETY</text>
                    <text x="50" y="130" fill="#2a3d5f" font-size="26" font-family="sans-serif" font-weight="600">AND PUBLIC TRUST</text>
                    <rect x="50" y="150" width="300" height="90" fill="#dceaf7"/>
                    <text x="70" y="190" fill="#1f3352" font-size="22" font-family="sans-serif">Text alerts improve</text>
                    <text x="70" y="220" fill="#1f3352" font-size="22" font-family="sans-serif">rapid response</text>
                    <text x="50" y="255" fill="#40556f" font-size="18" font-family="sans-serif">Inclusive communication is part of the project design.</text>
                </svg>
            </div>

            <details class="mt-6 rounded-lg border border-subtle bg-surface-3 p-4">
                <summary class="cursor-pointer font-medium text-ink focus-visible:focus-ring rounded-sm">Reveal the key issue</summary>
                <p class="mt-3 text-sm leading-7 text-ink-muted">The point is not just that the graphic contains text. The point is that the information in the text still matters when the image cannot be perceived.</p>
            </details>
        </section>

        <section class="rounded-xl border border-subtle bg-surface-2 p-5 md:p-6">
            <h2 class="text-2xl font-semibold text-ink">Example 4: Complex visual</h2>
            <p class="mt-3 text-base leading-7 text-ink-muted">What does someone actually need to know from this chart?</p>

            <div class="mt-6 grid gap-5 lg:grid-cols-[1.2fr_0.8fr]">
                <div class="rounded-lg border border-subtle bg-surface-3 p-4">
                    <svg viewBox="0 0 540 260" role="img" aria-label="Bar chart showing a steady rise in student participation over five years" xmlns="http://www.w3.org/2000/svg" class="w-full rounded-lg border border-subtle bg-surface-2">
                        <rect x="0" y="0" width="540" height="260" fill="#f6f7fa"/>
                        <line x1="70" y1="210" x2="500" y2="210" stroke="#4b5563" stroke-width="2"/>
                        <line x1="70" y1="35" x2="70" y2="210" stroke="#4b5563" stroke-width="2"/>
                        <g fill="#4f8cc9">
                            <rect x="95" y="150" width="40" height="60"/>
                            <rect x="170" y="126" width="40" height="84"/>
                            <rect x="245" y="100" width="40" height="110"/>
                            <rect x="320" y="70" width="40" height="140"/>
                            <rect x="395" y="48" width="40" height="162"/>
                        </g>
                        <g fill="#475569" font-size="12" font-family="sans-serif">
                            <text x="102" y="230">2021</text>
                            <text x="177" y="230">2022</text>
                            <text x="252" y="230">2023</text>
                            <text x="327" y="230">2024</text>
                            <text x="402" y="230">2025</text>
                        </g>
                    </svg>
                </div>

                <div class="rounded-lg border border-subtle bg-surface-3 p-4">
                    <p class="text-sm leading-7 text-ink-muted">Weak alternative: Bar chart showing a steady rise in student participation over five years.</p>
                    <p class="mt-4 text-sm leading-7 text-ink-muted">That identifies the object, but it does not communicate the pattern, the increase, or the main conclusion the chart is meant to show.</p>
                </div>
            </div>

            <details class="mt-6 rounded-lg border border-subtle bg-surface-3 p-4">
                <summary class="cursor-pointer font-medium text-ink focus-visible:focus-ring rounded-sm">Reveal the point</summary>
                <p class="mt-3 text-sm leading-7 text-ink-muted">Complex visuals may need a short identification, the important trend or conclusion in nearby text, and, if useful, access to the underlying values or a longer description. One short sentence is not always enough.</p>
            </details>
        </section>

        <section class="rounded-xl border border-subtle bg-surface-2 p-5 md:p-6">
            <h2 class="text-2xl font-semibold text-ink">Example 5: Audio and video</h2>
            <p class="mt-3 text-base leading-7 text-ink-muted">Ask separately: What is lost if you cannot hear it? What is lost if you cannot see it?</p>

            <div class="mt-6 rounded-lg border border-subtle bg-surface-3 p-4">
                <video controls preload="metadata" poster="/images/media-purpose-collab.jpg" class="w-full rounded-lg border border-subtle bg-surface-2" aria-label="Short classroom video demonstrating a project update and a visible state change">
                    <source src="/media/media-purpose-video.mp4" type="video/mp4" />
                    <track kind="captions" label="English captions" src="/media/media-purpose-video.vtt" srclang="en" default />
                    Your browser does not support the video tag.
                </video>
            </div>

            <details class="mt-6 rounded-lg border border-subtle bg-surface-3 p-4">
                <summary class="cursor-pointer font-medium text-ink focus-visible:focus-ring rounded-sm">Reveal the distinction</summary>
                <p class="mt-3 text-sm leading-7 text-ink-muted">Captions help with spoken and important non-speech audio. A transcript preserves audio information in text. Meaningful visual information may still need description when it is necessary to understand the video.</p>
            </details>
        </section>
    </div>
</x-layouts.app>
