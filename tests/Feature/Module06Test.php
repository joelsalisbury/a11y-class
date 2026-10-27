<?php

it('serves the Module 06 teaching pages and experience routes', function (string $path, string $view) {
    $this->get($path)->assertOk()->assertViewIs($view);
})->with([
    ['/modules/6', 'course.modules.show'],
    ['/modules/6/session-12', 'course.modules.session'],
    ['/modules/6/session-13', 'course.modules.session'],
    ['/modules/6/challenge', 'course.modules.challenge'],
    ['/modules/6/resources', 'course.modules.resources'],
    ['/experiences/module-06/motion', 'experiences.module06-motion'],
    ['/experiences/module-06/cognition', 'experiences.module06-cognition'],
    ['/experiences/gearshare', 'experiences.gearshare'],
]);

it('renders Session 13 as cognitive-accessibility instruction and informal Challenge 06 studio', function () {
    $this->get('/modules/6/session-13')->assertOk()
        ->assertSee('Module 06 — Cognitive Accessibility & Challenge Studio')
        ->assertSee('Thursday, October 15, 2026')
        ->assertSee('Intrinsic load')
        ->assertSee('Extraneous load')
        ->assertSee('Germane load')
        ->assertSee('Understanding unfamiliar information, solving a problem, or making a complex decision')
        ->assertSee('Confusing navigation, inconsistent terminology, and unclear instructions')
        ->assertSee('Recognizing patterns, connecting ideas, and learning how a system works')
        ->assertDontSee('Comparing three camera kits')
        ->assertSee('People with ADHD, learning disabilities, memory impairments')
        ->assertSee('1.3.1 Info and Relationships (A)')
        ->assertSee('2.4.6 Headings and Labels (AA)')
        ->assertSee('3.2.3 Consistent Navigation (AA)')
        ->assertSee('3.3.2 Labels or Instructions (A)')
        ->assertSee('3.3.3 Error Suggestion (AA)')
        ->assertSee('3.3.7 Redundant Entry (A)')
        ->assertSee('Teams do not present to the whole class')
        ->assertSee('Open Challenge 06')
        ->assertSee('How Much Can You Keep in Your Head?')
        ->assertSee('/modules/6/challenge')
        ->assertSee('/experiences/gearshare')
        ->assertSee('/experiences/module-06/cognition?slide=3')
        ->assertSee('Looking Ahead: Accessibility Studio')
        ->assertSee('Starting October 20')
        ->assertSee('Each challenge will arrive alongside relevant instructional content')
        ->assertSee('Keep attending and participating')
        ->assertSee('Every Monday')
        ->assertSee('October 27')
        ->assertSee('Module 08 opens: Practice and Studio. Challenge 08 released.')
        ->assertSee('October 29')
        ->assertSee('Quiz 2 at home through HuskyCT. No in-person class. Final Project released.')
        ->assertSee('November–December')
        ->assertSee('A/AA/AAA conformance')
        ->assertSee('further instructions will be provided before the quiz.')
        ->assertDontSee('9:30–9:40')
        ->assertDontSee('Team critique');

    $response = $this->get('/modules/6/session-13')->assertOk();
    $document = new DOMDocument;
    @$document->loadHTML($response->getContent());
    $xpath = new DOMXPath($document);

    $dateList = $xpath->query('//dl[@aria-label="Important dates"]')->item(0);
    expect($dateList)->not->toBeNull();
    expect($xpath->query('./div[dt and dd]', $dateList)->length)->toBe(4);
});

it('publishes the upcoming assessment dates', function () {
    $this->get('/syllabus')->assertOk()
        ->assertSee('Quiz 2 is an at-home assessment on Thursday, October 29, 2026')
        ->assertSee('existing course material and practical accessibility evaluation skills')
        ->assertSee('The Final Project will be released Thursday, October 29.')
        ->assertSee('screen-reader proficiency')
        ->assertSee('remediation and verification')
        ->assertSee('9 Challenges Total')
        ->assertSee('35%')
        ->assertSee('5%')
        ->assertSee('30%');
});

it('keeps the Module 06 instructor key unavailable over HTTP', function () {
    $this->get('/instructor/modules/6/answer-key')->assertNotFound();
});

it('does not publish answer-key classifications in GearShare or its brief', function () {
    $this->get('/experiences/gearshare')->assertOk()
        ->assertDontSee('grading_nuance')
        ->assertDontSee('Specific accessibility requirement')
        ->assertDontSee('3.3.7');

    $this->get('/modules/6/challenge')->assertOk()
        ->assertSee('12 deliberate issues')
        ->assertSee('Team Challenge · 10 points')
        ->assertDontSee('selection-arrival')
        ->assertDontSee('updates-track');
});

it('resolves the new reference entries through the shared Field Guide', function (string $slug) {
    $this->get('/field-guide/'.$slug)->assertOk()
        ->assertViewIs('course.field-guide-entry')
        ->assertSee('Authoritative Resources');
})->with([
    'enough-time',
    'pause-stop-hide',
    'flashing-physical-reactions',
    'reduced-motion',
    'predictable-interaction',
    'clear-understandable-content',
    'reduce-memory-repetition',
    'failure-concern-preference',
]);

it('renders an accessible presentation with the full review available without JavaScript', function (int $session, int $count) {
    $response = $this->get('/modules/6/session-'.$session)->assertOk();
    $document = new DOMDocument;
    @$document->loadHTML($response->getContent());
    $xpath = new DOMXPath($document);

    expect($xpath->query('//*[@data-session-slide]')->length)->toBe($count);
    expect($xpath->query('//*[@data-presentation-deck]')->item(0)->hasAttribute('hidden'))->toBeTrue();
    expect($xpath->query('//*[@data-session-review]')->item(0)->hasAttribute('hidden'))->toBeFalse();
    expect($xpath->query('//*[@data-session-review]//*[@id="session-resources"]')->length)->toBe(1);
    expect($xpath->query('//button[@data-slide-previous or @data-slide-next or @data-view-all]')->length)->toBe(3);
})->with([[12, 12], [13, 9]]);

it('preserves the originating slide on Module 06 demo return links', function () {
    $this->get('/experiences/module-06/motion?slide=6')->assertOk()->assertSee('/modules/6/session-12#slide-6');
    $this->get('/experiences/module-06/cognition?slide=3')->assertOk()->assertSee('/modules/6/session-13#slide-3');
    $this->get('/experiences/module-06/motion?slide=999')->assertOk()->assertDontSee('#slide-999');
});

it('presents the cognition experience as one labeled two-version reservation task', function () {
    $response = $this->get('/experiences/module-06/cognition')->assertOk()
        ->assertSee('Camera Kit')
        ->assertSee('Version A')
        ->assertSee('Version B')
        ->assertSee('Thursday morning')
        ->assertSee('three-person documentary shoot')
        ->assertSee('next day')
        ->assertSee('An interface can satisfy applicable WCAG success criteria while still imposing unnecessary cognitive demands on its users.')
        ->assertSee('3.2.3 Consistent Navigation (AA)')
        ->assertSee('3.3.2 Labels or Instructions (A)')
        ->assertSee('3.3.7 Redundant Entry (A)')
        ->assertSee('2.4.6 Headings and Labels (AA)')
        ->assertDontSee('student@example.edu');

    $document = new DOMDocument;
    @$document->loadHTML($response->getContent());
    $xpath = new DOMXPath($document);

    expect($xpath->query('//*[@data-reservation-form="high"]')->length)->toBe(1);
    expect($xpath->query('//*[@data-reservation-form="low"]')->length)->toBe(1);
    expect($xpath->query('//*[@data-progress="low"]/li')->length)->toBe(4);

    foreach ($xpath->query('//form//select|//form//input') as $control) {
        expect($xpath->query('//label[@for="'.$control->getAttribute('id').'"]')->length)->toBe(1);
    }
});

it('presents GearShare as an equipment service with labeled controls and local illustrations', function () {
    $response = $this->get('/experiences/gearshare')->assertOk()
        ->assertSee('Equipment Desk Updates')
        ->assertSee('Find Equipment')
        ->assertSee('Borrowing Details')
        ->assertSee('Notification email (required)')
        ->assertDontSee('Test expiry now')
        ->assertDontSee('Reset expired hold')
        ->assertDontSee('grading_nuance');
    $document = new DOMDocument;
    @$document->loadHTML($response->getContent());
    $xpath = new DOMXPath($document);

    expect($xpath->query('//*[@data-kit-card]')->length)->toBe(4);
    expect($xpath->query('//img')->length)->toBe(4);
    foreach ($xpath->query('//img') as $image) {
        expect($image->getAttribute('alt'))->not->toBeEmpty();
        expect(file_exists(public_path(parse_url($image->getAttribute('src'), PHP_URL_PATH))))->toBeTrue();
    }
    foreach ($xpath->query('//input|//select') as $control) {
        expect($xpath->query('//label[@for="'.$control->getAttribute('id').'"]')->length)->toBe(1);
    }
});

it('publishes a cumulative twelve-item assignment without disclosing the planted locations', function () {
    $this->get('/modules/6/challenge')->assertOk()
        ->assertSee('12-item Evaluation')
        ->assertSee('distinguish law, technical standards, institutional requirements, and broader guidance')
        ->assertSee('You do not need to label findings by module')
        ->assertDontSee('Equipment return reference')
        ->assertDontSee('pickup-hours')
        ->assertDontSee('pointerup');
    $key = require resource_path('course/instructor/modules/06.php');
    expect(array_column($key['sample_experience']['answer_key'], 'number'))->toBe(range(1, 12));
});

it('contains exactly one generic image alternative and one conflicting form name', function () {
    $response = $this->get('/experiences/gearshare')->assertOk();
    $document = new DOMDocument;
    @$document->loadHTML($response->getContent());
    $xpath = new DOMXPath($document);

    expect($xpath->query('//img[@alt="Equipment photo"]')->length)->toBe(1);
    expect($xpath->query('//input[@aria-label]')->length)->toBe(1);
    expect($xpath->query('//input[@id="project-name"]')->item(0)->getAttribute('aria-label'))->toBe('Equipment return reference');
    expect($xpath->query('//*[@class="pickup-hours"]')->length)->toBe(1);
    expect($xpath->query('//button[@id="extra-battery"]')->length)->toBe(1);
});
