<pre class="overflow-x-auto rounded-lg bg-surface-2 p-4 text-sm"><code>&lt;div role="button" tabindex="0" onclick="savePlan()"&gt;
    Save
&lt;/div&gt;</code></pre>
<details class="rounded-lg border border-subtle bg-surface-2 p-5">
    <summary class="cursor-pointer font-semibold text-ink focus-visible:focus-ring">Reveal — what does this establish?</summary>
    <div class="mt-4 space-y-3">
        <p>“Save” supplies a name. role="button" supplies a role. tabindex="0" permits focus. None supplies Enter or Space activation. A pointer-only handler still leaves a keyboard barrier.</p>
        <p>Prefer a native button while retaining the action:</p>
        <pre class="overflow-x-auto text-sm"><code>&lt;button type="button" onclick="savePlan()"&gt;Save&lt;/button&gt;</code></pre>
        <p>Observe the original behavior; claim a keyboard barrier; check WCAG 2.1.1 (A); test Tab, Enter, and Space; fix the element; retest those keys and pointer activation. Then verify the name, role, and save feedback separately. A plausible snippet alone does not prove success.</p>
    </div>
</details>
