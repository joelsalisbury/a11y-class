<section id="challenge-approved-pages" class="course-section module-anchor">
    <x-section-heading title="Choose One Approved Page" />
    <div class="course-copy">
        <ul>
            @foreach ($challenge['approved_pages'] as $page)
                <li><a href="{{ $page['href'] }}" class="text-accent-cyan underline focus-visible:focus-ring">{{ $page['label'] }}</a></li>
            @endforeach
        </ul>
        <p>Review one linked page, not an entire website. Record its URL, review date, browser, and relevant page state so your observations can be understood later. These are live pages and may change; none is assigned because it is known to contain a specific problem.</p>
    </div>
</section>

<section id="challenge-wave" class="course-section module-anchor">
    <x-section-heading title="Part 1: Run WAVE" />
    <div class="course-copy">
        <p>Run <a href="https://wave.webaim.org/" class="text-accent-cyan underline focus-visible:focus-ring">WAVE</a> on your selected page. Explore Errors, Contrast Errors, Alerts, Features, Structure, and ARIA where present. You do not need to explain every result.</p>
        <p>Record:</p>
        <ul>
            <li>Several results that seem important</li>
            <li>At least one item that appears to require human judgment</li>
            <li>Anything interesting in Structure, Features, or ARIA</li>
        </ul>
        <p>Show what you explored beyond the error count. If no alert or error is reported, inspect a feature or structural item for contextual judgment. See <a href="{{ route('modules.session', ['module' => 7, 'session' => 14]) }}#read-wave-deliberately" class="text-accent-cyan underline focus-visible:focus-ring">Session 14’s WAVE instructions</a> or <a href="https://wave.webaim.org/help" class="text-accent-cyan underline focus-visible:focus-ring">WAVE Help</a>.</p>
    </div>
</section>

<section id="challenge-lighthouse" class="course-section module-anchor">
    <x-section-heading title="Part 2: Run Lighthouse" />
    <div class="course-copy">
        <p>On the same page, open <strong>Chrome DevTools → Lighthouse → Accessibility</strong> and run the analysis.</p>
        <p>Record the Accessibility score, several audit results, anything Lighthouse asks you to inspect manually, and anything useful or confusing about the report. You do not need to find a difference between the two tools.</p>
        <p class="course-emphasis">The Lighthouse accessibility score is not a WCAG conformance score.</p>
        <p>See <a href="https://developer.chrome.com/docs/lighthouse/accessibility/scoring" class="text-accent-cyan underline focus-visible:focus-ring">Chrome’s accessibility scoring documentation</a>.</p>
    </div>
</section>

<section id="challenge-validate" class="course-section module-anchor">
    <x-section-heading title="Part 3: Validate Findings" />
    <div class="course-copy">
        <p>Choose <strong>three findings</strong> from WAVE, Lighthouse, or both to investigate. Findings can include alerts, features, or passed audits; you are not required to find three failures.</p>
        <p>For each, briefly document:</p>
        <ul>
            <li><strong>Tool result:</strong> What did the tool report?</li>
            <li><strong>What I observed:</strong> Inspect the actual page and reproduce or examine the condition.</li>
            <li><strong>WCAG evidence:</strong> Where applicable, give the relevant criterion number, name, conformance level, and a link or citation to the W3C source.</li>
            <li><strong>Conclusion:</strong> Supported; Partially supported; or Not supported / requires more context. Explain why.</li>
        </ul>
        <p>You do not have to agree with the tool. A well-supported qualification or rejection is acceptable.</p>
    </div>
</section>

<section id="challenge-manual" class="course-section module-anchor">
    <x-section-heading title="Part 4: Look for Something Automation Missed" />
    <div class="course-copy">
        <p>Perform at least <strong>two manual accessibility checks</strong> appropriate to this page. Options include keyboard navigation, visible focus, focus order, headings, landmarks, accessible names, alt text quality in context, zoom/reflow, forms and errors, screen-reader testing, or unexpected interaction behavior.</p>
        <p class="course-emphasis">Did you find anything important that WAVE and Lighthouse did not establish?</p>
        <p>Document the methods, steps, and results of both checks, including at least <strong>one manual observation</strong>. That observation may be a real problem, something requiring more investigation, or a correctly implemented behavior that automation did not explain. Do not manufacture a failure.</p>
        <p>The <a href="{{ route('field-guide.entry', ['entry' => 'testing-workflow']) }}" class="text-accent-cyan underline focus-visible:focus-ring">Field Guide testing workflow</a> can help you choose an appropriate check.</p>
    </div>
</section>

<section id="challenge-ai-claims" class="course-section module-anchor">
    <x-section-heading title="Part 5: Ask ChatGPT or Another AI Assistant" />
    <div class="course-copy">
        <p>Use ChatGPT, Microsoft Copilot, or another comparable assistant you already use as a second opinion. Give it a concise summary of your findings, without private or sensitive information. A free option is sufficient.</p>
        <p>Recommended prompt:</p>
        <blockquote class="border-l-2 border-accent-cyan pl-5">{{ $challenge['ai_prompt'] }}</blockquote>
        <p>Choose <strong>three AI claims or recommendations</strong> to check. For each, document:</p>
        <ul>
            <li><strong>What the AI said:</strong> A brief excerpt or summary</li>
            <li><strong>How I checked it:</strong> W3C/WCAG, direct testing, browser inspection, or course resources</li>
            <li><strong>My conclusion:</strong> Supported; Partially supported; or Unsupported, with a brief explanation</li>
        </ul>
        <p>If the response contains fewer than three claims or recommendations, ask the assistant to consider additional observations from your review. Keep the follow-up in your AI Use Note. The AI may be correct; you do not need to find a mistake. What matters is verification.</p>
    </div>
</section>

<section id="challenge-wcag" class="course-section module-anchor">
    <x-section-heading title="Required WCAG Evidence" />
    <div class="course-copy">
        <p>Use at least <strong>three relevant WCAG success criteria</strong> somewhere in your submission. For each, include its number, name, conformance level, and W3C source. Explain how it relates to what you actually observed; unrelated citations do not support a finding.</p>
        <p>Use the <a href="https://www.w3.org/WAI/WCAG22/quickref/" class="text-accent-cyan underline focus-visible:focus-ring">WCAG 2.2 Quick Reference</a> to locate criteria and their Understanding pages. You choose the criteria. Relevant evidence can support a correctly implemented behavior or a qualified conclusion as well as a failure.</p>
    </div>
</section>

<section id="challenge-conclusion" class="course-section module-anchor">
    <x-section-heading title="What Can You Actually Claim?" />
    <div class="course-copy">
        <p>End with brief answers to:</p>
        <ol>
            <li>What did WAVE and Lighthouse help you establish?</li>
            <li>What still required human judgment or manual testing?</li>
            <li>Did you find anything the automated tools missed or could not establish?</li>
            <li>How useful was the AI assistant?</li>
            <li>What can you confidently say about this one page?</li>
            <li>What can you not claim from this review?</li>
        </ol>
        <p>Reviewing one page does not establish accessibility or conformance of an entire UConn website.</p>
        <p class="course-emphasis">A tool report is not a conformance determination.</p>
    </div>
</section>
