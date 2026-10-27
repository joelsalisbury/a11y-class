<?php

use App\Support\Course;

it('serves Module 07 through the existing course pages', function (string $path, string $view) {
    $this->get($path)->assertOk()->assertViewIs($view);
})->with([
    ['/modules/7', 'course.modules.show'],
    ['/modules/7/session-14', 'course.modules.session'],
    ['/modules/7/session-15', 'course.modules.session'],
    ['/modules/7/challenge', 'course.modules.challenge'],
    ['/modules/7/resources', 'course.modules.resources'],
    ['/field-guide/testing-tools', 'course.field-guide-entry'],
    ['/field-guide/ai-accessibility', 'course.field-guide-entry'],
]);

it('makes the same self-contained activities and closed reveals available in both reading modes', function (int $session) {
    $response = $this->get('/modules/7/session-'.$session)->assertOk();
    $document = new DOMDocument;
    @$document->loadHTML($response->getContent());
    $xpath = new DOMXPath($document);
    $deck = $xpath->query('//*[@data-presentation-deck]')->item(0);
    $review = $xpath->query('//*[@data-session-review]')->item(0);

    expect($deck->hasAttribute('hidden'))->toBeTrue();
    expect($review->hasAttribute('hidden'))->toBeFalse();
    expect($xpath->query('.//details', $deck)->length)->toBeGreaterThan(0);
    expect($xpath->query('.//details', $review)->length)->toBe($xpath->query('.//details', $deck)->length);
    expect($xpath->query('//details[@open]')->length)->toBe(0);
    expect($xpath->query('//*[@data-session-review]//*[@id="session-resources"]')->length)->toBe(1);

    $ids = [];
    foreach ($xpath->query('//*[@id]') as $element) {
        $ids[] = $element->getAttribute('id');
    }
    expect(count($ids))->toBe(count(array_unique($ids)));
})->with([14, 15]);

it('keeps the original evaluation sample separate from its explicit revised version', function (string $query, bool $revised) {
    $response = $this->get('/experiences/module-07/studio-booking'.$query)->assertOk();
    $document = new DOMDocument;
    @$document->loadHTML($response->getContent());
    $xpath = new DOMXPath($document);

    expect($xpath->query('//button[@aria-label="Find available times"]')->length)->toBe($revised ? 1 : 0);
    expect($xpath->query('//div[@role="button"]')->length)->toBe($revised ? 0 : 1);
    expect($xpath->query('//button[normalize-space(.)="Reserve this time"]')->length)->toBe($revised ? 1 : 0);
    expect($xpath->query('//img[@alt=""]')->length)->toBe(1);
    expect($xpath->query('//a[@href="#prepare-title" and normalize-space(.)="Click here"]')->length)->toBe(1);
    expect($xpath->query('//*[@id="prepare-title"]')->length)->toBe(1);
    $response->assertDontSee('Check Your Work')->assertDontSee('2.1.1');
})->with([
    ['', false],
    ['?version=revised', true],
    ['?version=anything-else', false],
]);

it('presents the downloadable working sample as escaped code rather than executing it in the lesson', function () {
    $response = $this->get('/modules/7/session-15')->assertOk()
        ->assertSee('samples/module07-studio-plan.html')
        ->assertSee('<div class="save" role="button" tabindex="0" onclick="savePlan()">Save</div>');
    $document = new DOMDocument;
    @$document->loadHTML($response->getContent());
    $xpath = new DOMXPath($document);

    expect($xpath->query('//*[@id="save-message"]')->length)->toBe(0);
    expect($xpath->query('//a[@download]')->length)->toBe(2);
    foreach ($xpath->query('//pre/code') as $code) {
        if (str_contains($code->textContent, '<!DOCTYPE html>')) {
            expect(trim($code->textContent))->toBe(trim(file_get_contents(public_path('samples/module07-studio-plan.html'))));
        }
    }
});

it('uses individual AI instructions and a ten-point rubric on Challenge 07', function () {
    $this->get('/modules/7/challenge')->assertOk()
        ->assertSee('Individual Challenge · 10 points')
        ->assertSee('Name your assistant and briefly describe how you used it, including any follow-up prompts.')
        ->assertDontSee('AI may help your team');

    $challenge = Course::module(7)['challenge'];
    expect(array_sum(array_column($challenge['evaluation_criteria'], 'points')))->toBe(10);
});

it('returns to a valid originating slide without accepting an arbitrary fragment', function (string $query, string $expected, string $unexpected) {
    $this->get('/experiences/module-07/studio-booking'.$query)->assertOk()
        ->assertSee($expected)
        ->assertDontSee($unexpected);
})->with([
    ['?slide=5', '/modules/7/session-14#slide-5', '#slide-999'],
    ['?slide=999', '/modules/7/session-14', '#slide-999'],
]);

it('links the live review to approved UConn pages and the WAVE lesson section', function () {
    $response = $this->get('/modules/7/challenge')->assertOk();
    $document = new DOMDocument;
    @$document->loadHTML($response->getContent());
    $xpath = new DOMXPath($document);
    $targets = [];

    foreach ($xpath->query('//a[@href]') as $link) {
        $href = $link->getAttribute('href');
        $path = parse_url($href, PHP_URL_PATH);
        $fragment = parse_url($href, PHP_URL_FRAGMENT);

        if (in_array($path, ['/modules/7/session-14', '/modules/7/session-15'], true) && $fragment) {
            $targets[$path][] = $fragment;
        }
    }

    expect($targets)->toHaveCount(1);
    foreach ($targets as $path => $fragments) {
        $lesson = $this->get($path)->assertOk();
        $lessonDocument = new DOMDocument;
        @$lessonDocument->loadHTML($lesson->getContent());
        $lessonXpath = new DOMXPath($lessonDocument);

        foreach ($fragments as $fragment) {
            expect($lessonXpath->query('//*[@data-session-review]//*[@id="'.$fragment.'"]')->length)->toBe(1);
        }
    }

    foreach (['https://studentactivities.uconn.edu/', 'https://recreation.uconn.edu/', 'https://dining.uconn.edu/', 'https://library.uconn.edu/'] as $url) {
        expect($xpath->query('//a[@href="'.$url.'"]')->length)->toBe(1);
    }
    expect($xpath->query('//a[@download]')->length)->toBe(0);
    $response->assertSee('Part 1: Run WAVE')
        ->assertSee('Part 2: Run Lighthouse')
        ->assertSee('Part 3: Validate Findings')
        ->assertSee('Part 4: Look for Something Automation Missed')
        ->assertSee('Part 5: Ask ChatGPT or Another AI Assistant')
        ->assertSee('Submit one concise individual PDF through HuskyCT.')
        ->assertDontSee('samples/module07-studio-plan.html')
        ->assertDontSee('Fix One Issue');
});

it('keeps live-site instructor guidance private and free of a predetermined answer key', function () {
    $this->get('/instructor/modules/7/answer-key')->assertNotFound();

    $notes = require resource_path('course/instructor/modules/07.php');
    expect($notes)->not->toHaveKey('sample_experience');
    expect(array_sum(array_column($notes['rubric'], 'points')))->toBe(10);
});
