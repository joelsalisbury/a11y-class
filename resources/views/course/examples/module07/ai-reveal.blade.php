<details class="rounded-lg border border-subtle bg-surface-2 p-5">
    <summary class="cursor-pointer font-semibold text-ink focus-visible:focus-ring">Check Your Work — open after investigating three claims</summary>
    <div class="mt-4 space-y-3">
        <p><strong>Semantics:</strong> “Choose your session” looks like a heading but is a paragraph. Inspect its role in the accessibility tree. A heading element can convey that relationship (1.3.1, A); changing font size alone cannot.</p>
        <p><strong>Interaction:</strong> Save receives focus but does not activate with Enter or Space. A keyboard claim is supported by reproducing that behavior and checking 2.1.1 (A). Replacing it with a native button can address activation; retest the handler.</p>
        <p><strong>Context:</strong> the illustrated room layout is the only source of the instruction to enter from the east door. Its alt="Studio diagram" does not communicate that information. Inspect the image and task before judging 1.1.1 (A). A generic description is insufficient here; equivalent nearby text could also provide the information.</p>
        <p><strong>Correctly implemented:</strong> the Session select has a matching explicit label. A claim that every field is unlabeled is unsupported. Confirm the computed name rather than adding redundant ARIA.</p>
        <p><strong>Easy to miss:</strong> Save updates a visible success message without moving focus or exposing a status role/live region. Inspect the runtime change and assess 4.1.3 (AA). A pre-existing role="status" container is one correction; actual announcement still needs a screen-reader retest. The AI might spot this or might assume visible feedback is enough.</p>
        <p>An incorrect criterion can make an otherwise useful observation only partially supported. A confident claim of full conformance is unsupported by this small investigation.</p>
    </div>
</details>
