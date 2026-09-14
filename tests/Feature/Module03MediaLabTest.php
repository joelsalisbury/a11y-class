<?php

use App\Support\Course;

it('has a media lab route and a simplified Module 03 structure', function () {
    $this->get('/modules/3/media-lab')->assertOk();

    expect(Course::module(3)['challenge']['experience_under_review'] ?? null)->toBeNull();
    expect(Course::module(3)['challenge']['teams'])->toHaveCount(3);

    $keyConcepts = \App\Support\KeyConcepts::collection(3)['concepts'];
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
