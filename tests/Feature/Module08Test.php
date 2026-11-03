<?php

use App\Support\Course;

it('serves the compact Module 08 and its references', function (string $path) {
    $this->get($path)->assertOk();
})->with(['/modules/8', '/modules/8/session-16', '/modules/8/challenge', '/modules/8/resources', '/field-guide/good-markup']);

it('keeps Module 08 available and advances Today to Module 09', function () {
    $this->get('/')->assertOk()
        ->assertSee('Module 09 — What Would You Fix First?')
        ->assertSee('Session 17 — Can You Actually Complete the Task?')
        ->assertViewHas('sessionNumber', 17);
    $this->get('/modules/8')->assertOk()
        ->assertSee('Build the Accessible Version')
        ->assertSee('Session 16')
        ->assertSee('Practice and Studio');
    $current = array_filter(Course::modules(), fn (array $module): bool => $module['status'] === 'current');
    expect(array_keys($current))->toBe([9]);
});

it('keeps Session 16 free of a deck, worksheet, or mandatory activities', function () {
    $this->get('/modules/8/session-16')->assertOk()
        ->assertSee('No new lecture today.')
        ->assertDontSee('data-session-presentation', false)
        ->assertDontSee('data-presentation-deck', false)
        ->assertDontSee('Run of Show')
        ->assertDontSee('Activities');
    $session = Course::module(8)['sessions'][16];
    expect($session['sections'])->toBeEmpty();
    expect($session)->not->toHaveKeys(['presentation_slides', 'activities', 'run_of_show']);
    $this->get('/modules/8/session-17')->assertNotFound();
});

it('requires all a11yphant challenges by November 3 with completion as the only scoring criterion', function () {
    $challenge = Course::module(8)['challenge'];
    expect($challenge['required_work'])->toBe('Complete every challenge on a11yphant, including all levels in each challenge.');
    expect($challenge['evaluation_criteria'])->toHaveCount(1);
    expect($challenge['evaluation_criteria'][0]['title'])->toBe('Completion');
    expect($challenge['evaluation_criteria'][0]['points'])->toBe(10);
    $this->get('/modules/8/challenge')->assertOk()
        ->assertSee('Individual Challenge · 10 points')
        ->assertSee('No account is required by this course.')
        ->assertSee('Complete every challenge on a11yphant, including all levels in each challenge.')
        ->assertSee('Submit one short PDF through HuskyCT')
        ->assertSee('Screenshots are acceptable evidence of completion.')
        ->assertDontSee('Example and explanation')
        ->assertDontSee('Communication and AI Use Note')
        ->assertSee('Because Quiz 2 is this week, Challenge 08 is due next week: by end of day Tuesday, November 3, 2026. Submit through HuskyCT.')
        ->assertDontSee('Team Assignments')
        ->assertDontSee('WCAG citations');
});

it('keeps quiz details intact while publishing the revised final project launch', function () {
    $this->get('/modules/8')->assertOk()
        ->assertSee('Thursday, October 29, 2026')
        ->assertSee('Quiz 2 is completed at home through HuskyCT.')
        ->assertSee('There is no in-person class meeting Thursday.')
        ->assertSee('Final Project released Tuesday, November 3, 2026.')
        ->assertSee('Good Markup Resources')
        ->assertDontSee('Class Work')
        ->assertDontSee('Presentation mode');
    $this->get('/syllabus')->assertOk()
        ->assertSee('Tuesday, October 27, 2026')
        ->assertSee('Challenge 08 released.')
        ->assertSee('Quiz 2 at home through HuskyCT. No in-person class.')
        ->assertSee('Challenge 08 due by end of day: complete all a11yphant challenges and submit evidence through HuskyCT.')
        ->assertSee('Quiz 03 is an individual, practical Course Selection task-completion and usability test.')
        ->assertDontSee('around November 3');
});
