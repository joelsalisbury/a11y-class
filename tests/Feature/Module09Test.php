<?php

use App\Support\Course;

it('publishes Module 09, Session 17, and the current class position', function () {
    $moduleResponse = $this->get('/modules/9')->assertOk()
        ->assertSee('What Would You Fix First?')
        ->assertSee('Learning Objectives')
        ->assertSee('Can You Actually Complete the Task?')
        ->assertSee('Quiz 03 — Course Selection Usability Test')
        ->assertSee('Open Course Selection');

    $moduleDocument = new DOMDocument;
    @$moduleDocument->loadHTML($moduleResponse->getContent());
    $moduleXpath = new DOMXPath($moduleDocument);
    expect($moduleXpath->query('//aside[@aria-label="Module navigation"]//a[@href="'.route('modules.show', ['module' => 9]).'#quiz-03" and @data-module-nav-link and not(@data-session-nav-link)]')->length)->toBe(2);

    $this->get('/modules/9/session-17')->assertOk()
        ->assertSee('Can someone finish the task, and what did it take to get there?')
        ->assertSee('Both students got the job done.')
        ->assertSee('On Course Search, I selected Monday and Open Sections.')
        ->assertSee('exactly five courses and at least 15 credits')
        ->assertSee('If you still need to finish Challenge 08, work on that first.')
        ->assertSee('WAVE, keyboard testing, screen readers, contrast checks, and AI-assisted evaluation')
        ->assertSee('/modules/9#quiz-03')
        ->assertSee('/final-project');

    $this->get('/')->assertOk()
        ->assertSee('Module 09 — What Would You Fix First?')
        ->assertSee('Session 17 — Can You Actually Complete the Task?')
        ->assertViewHas('sessionNumber', 17);
    $this->get('/syllabus')->assertOk()
        ->assertSee('Session 17: Can You Actually Complete the Task?');

    expect(Course::current())->toBe(['module' => 9, 'session' => 17]);
    expect(Course::module(9)['learning_objectives'])->toHaveCount(5);
    $currentModules = array_filter(Course::modules(), fn (array $module): bool => $module['status'] === 'current');
    expect(array_keys($currentModules))->toBe([9]);
});

it('links to the quiz on the module overview from Session 17 without marking it current', function () {
    $response = $this->get('/modules/9/session-17')->assertOk();
    $document = new DOMDocument;
    @$document->loadHTML($response->getContent());
    $xpath = new DOMXPath($document);
    $quizLinks = $xpath->query('//aside[@aria-label="Module navigation"]//a[@href="'.route('modules.show', ['module' => 9]).'#quiz-03"]');

    expect($quizLinks->length)->toBe(2);
    foreach ($quizLinks as $link) {
        expect($link->hasAttribute('aria-current'))->toBeFalse();
        expect($link->hasAttribute('data-session-nav-link'))->toBeFalse();
    }
});

it('makes the triage practice keyboard-operable and uses unrelated fictional examples', function () {
    $response = $this->get('/modules/9/session-17')->assertOk();

    $document = new DOMDocument;
    @$document->loadHTML($response->getContent());
    $xpath = new DOMXPath($document);

    expect($xpath->query('//fieldset[legend[contains(., "Which would you investigate or address first?")]]')->length)->toBe(1);
    expect($xpath->query('//input[@type="radio" and @name="module-09-triage"]')->length)->toBe(3);
    expect($xpath->query('//label[@for="triage-reservation"]')->length)->toBe(1);
    expect($xpath->query('//label[@for="triage-hours"]')->length)->toBe(1);
    expect($xpath->query('//label[@for="triage-footer"]')->length)->toBe(1);
    expect($xpath->query('//p[@role="status" and @aria-live="polite"]')->length)->toBe(3);
    expect($xpath->query('//fieldset[contains(., "community library")]')->item(0)->textContent)->not->toContain('Course Selection');
});

it('publishes Quiz 03 as part of the existing quiz category rather than a challenge', function () {
    $quiz = Course::module(9)['quiz'];

    expect($quiz['number'])->toBe(3);
    expect($quiz['requirements'])->toHaveCount(4);
    expect(Course::module(9)['challenge'])->toBeNull();

    $this->get('/modules/9')->assertOk()
        ->assertSee('two useful observations')
        ->assertSee('one important improvement')
        ->assertSee('through HuskyCT')
        ->assertSee('three individual quizzes worth 30% total')
        ->assertDontSee('Challenge 09');

    $this->get('/modules/9/challenge')->assertNotFound();
    $this->get('/syllabus')->assertOk()
        ->assertSee('3 Individual Quizzes')
        ->assertSee('30%')
        ->assertSee('Quiz 03 is an individual, practical Course Selection task-completion and usability test.');
});

it('preserves the final-project weight and 100-point rubric while specifying the investigation', function () {
    $response = $this->get('/final-project')->assertOk()
        ->assertSee('Individual Final Project · 30% of the course grade')
        ->assertSee('8–12 pages')
        ->assertSee('three distinct Course Selection pages')
        ->assertSee('materially different application states')
        ->assertSee('two meaningful tasks')
        ->assertSee('three specific claims about accessibility or your findings')
        ->assertSee('substantive accessibility or inclusive-design findings across at least four application areas')
        ->assertSee('six accurately applied WCAG success-criterion references')
        ->assertSee('two findings through manual testing')
        ->assertSee('two investigated potential problems')
        ->assertSee('Working code and interactive prototypes are not required.')
        ->assertSee('authoritative course schedule or deadline posted in HuskyCT');

    $document = new DOMDocument;
    @$document->loadHTML($response->getContent());
    $xpath = new DOMXPath($document);
    $pointNodes = $xpath->query('//section[@id="rubric"]//tbody/tr/th[@scope="row" and normalize-space(.) != "Total"]/following-sibling::td[1]');
    $points = [];

    foreach ($pointNodes as $pointNode) {
        $points[] = (int) $pointNode->textContent;
    }

    expect($points)->toBe([20, 25, 15, 25, 10, 5]);
    expect(array_sum($points))->toBe(100);
    $this->get('/syllabus')->assertOk()
        ->assertSee('Individual Final Project')
        ->assertSee('30%');
});
