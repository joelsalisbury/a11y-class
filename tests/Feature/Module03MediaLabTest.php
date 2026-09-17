<?php

use App\Support\Course;
use App\Support\KeyConcepts;

it('has a media lab route and a simplified Module 03 structure', function () {
    $this->get('/modules/3/media-lab')
        ->assertOk()
        ->assertSee('href="https://www.w3.org/WAI/perspective-videos/captions"', false)
        ->assertSee('Open resource')
        ->assertSee('https://cdn.whelen.com/a8/ac/a8975d6348e0a027e75ca183fd11/hm1.mp3', false)
        ->assertSee('What would happen if someone could not hear this hazardous material incident?');

    $challenge = $this->get('/modules/3/challenge')
        ->assertOk()
        ->assertSee('Build the Quiz 1 Study Guide')
        ->assertSee('What do we need to understand from Modules 01–03 to make and defend good accessibility decisions?')
        ->assertSee('Standards and WCAG')
        ->assertSee('Institutional Requirements')
        ->assertSee('Law and Accessibility')
        ->assertSee('approximately 2–3 pages as a PDF')
        ->assertSee('For Each Topic')
        ->assertSee('Identify the most important ideas in plain language.');

    $challenge->assertDontSee('Accessible Treatment')
        ->assertDontSee('assigned media items')
        ->assertDontSee('Experience Under Review');

    $this->get('/modules/3/session-5')
        ->assertOk()
        ->assertSee('Quiz 1 will cover the first three modules.')
        ->assertSee('Open Challenge 03');

    $this->get('/modules/3/session-6')
        ->assertOk()
        ->assertSee('Check the Guide')
        ->assertSee('Cross-Check')
        ->assertSee('Finish Challenge 03');

    $this->get('/modules/3')
        ->assertOk()
        ->assertSee('The three Challenge 03 submissions will be archived here as review material for Quiz 1.');

    expect(Course::module(3)['challenge']['experience_under_review'] ?? null)->toBeNull();
    expect(Course::module(3)['challenge']['teams'])->toHaveCount(3);

    foreach (Course::module(3)['challenge']['teams'] as $team) {
        foreach ($team['topics'] as $topic) {
            expect($topic)->toHaveKey('description');
            expect($topic)->not->toHaveKey('what_you_need_to_know');
            expect($topic)->not->toHaveKey('how_to_think_about_it');
            expect($topic)->not->toHaveKey('example');
            expect($topic)->not->toHaveKey('common_mistake');
            expect($topic)->not->toHaveKey('sources');
        }
    }

    $keyConcepts = KeyConcepts::collection(3)['concepts'];
    expect($keyConcepts)->toHaveCount(5);
    expect(array_map(fn ($concept) => $concept['title'], $keyConcepts))->toMatchArray([
        'Media Has a Purpose',
        'Not Every Image Needs a Description',
        'Describe the Meaning, Not Every Pixel',
        'Complex Visuals Need an Equivalent',
        'Audio and Video Carry Different Information',
    ]);

    foreach ($keyConcepts as $concept) {
        expect($concept)->not->toHaveKey('example');
        expect($concept['references'])->toBeArray();
        expect($concept['references'])->not->toBeEmpty();
    }
});
