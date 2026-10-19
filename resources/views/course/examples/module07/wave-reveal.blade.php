<details class="mt-5 rounded-lg border border-subtle bg-surface-2 p-5">
    <summary class="cursor-pointer font-semibold text-ink focus-visible:focus-ring">Check Your Work — open after running WAVE</summary>
    <div class="mt-4 space-y-3">
        <p><strong>Error:</strong> the search icon button has no accessible name. Inspect the button and its aria-hidden icon. Give the action a meaningful name, such as “Find available times.”</p>
        <p><strong>Contrast:</strong> the small booking note uses #aaaaaa on white, about 2.32:1. Normal text needs 4.5:1 (WCAG 1.4.3, AA). Inspect the actual colors rather than guessing from appearance.</p>
        <p><strong>Alert:</strong> “Click here” triggers a Suspicious link text alert. Read the whole paragraph: it identifies the studio preparation checklist, and the link reaches that section. Judge purpose in context (2.4.4, A); this alert alone does not establish failure. Descriptive link text would still make scanning easier.</p>
        <p><strong>Features:</strong> inspect the explicit select label, skip link, and null image alternative. The illustration is decorative here; all booking information is text. Use Structure for headings, main, and the preparation list; inspect ARIA for the availability status. Their presence still needs contextual review.</p>
        <p><strong>Not established:</strong> “Reserve this time” responds to pointer clicks but is skipped by Tab and cannot be activated with Enter or Space. Try it. A name and role do not provide keyboard behavior (WCAG 2.1.1, A). WAVE may expose the markup without establishing this interaction.</p>
        <p>Your report may include additional alerts or structural indicators. Explain the element and evidence; do not chase a predetermined count.</p>
        <p>After comparing both tools on the original, <a href="{{ route('experiences.module07.tools', ['version' => 'revised']) }}" target="_blank" rel="noopener noreferrer" class="text-accent-cyan underline focus-visible:focus-ring">open the revised booking page</a>. Repeat the scans and keyboard reservation task. The contextual “Click here” link may still receive an alert. What changed, and what remains untested?</p>
    </div>
</details>
