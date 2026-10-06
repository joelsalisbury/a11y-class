<?php

use App\Support\Course;

test('MakerMap remains a single scrolling service page with the specified spaces and sections', function () {
    $response = $this->get('/experiences/makermap')
        ->assertOk()
        ->assertSee('<title>MakerMap | Campus Creative Spaces</title>', false)
        ->assertSee('<h1 id="maker-title">MakerMap</h1>', false)
        ->assertSee('Find the right campus creative space for your project.')
        ->assertSee('Find a Space')
        ->assertSee('Available Spaces')
        ->assertSee('Compare Equipment')
        ->assertSee('Getting There')
        ->assertSee('Before You Visit')
        ->assertSee('Request an Orientation')
        ->assertSee('About MakerMap / Accessibility')
        ->assertSee('Digital Fabrication Lab')
        ->assertSee('Media Production Studio')
        ->assertSee('Electronics Workshop')
        ->assertSee('Textiles & Prototyping Lab')
        ->assertSee('Return to Challenge 05')
        ->assertDontSee('Design Futures');

    expect(substr_count($response->getContent(), 'data-space-card'))->toBe(4);

    $this->get('/experiences/module-05/design-futures-registration')->assertNotFound();
});

test('MakerMap contains the intentionally scoped review candidates and correctly built comparison table', function () {
    $response = $this->get('/experiences/makermap')->assertOk();
    $html = $response->getContent();

    $response
        ->assertSee('MakerMap passed WAVE with no errors and meets WCAG 2.1 AA and Section 508 accessibility requirements.')
        ->assertSee('alt="Campus makerspace map"', false)
        ->assertSee('src="https://media.w3.org/wai/accessibility-intro/intro.mp4"', false)
        ->assertSee('Video: W3C Web Accessibility Initiative. Used with', false)
        ->assertSee('W3C transcript with description of visuals')
        ->assertSee('Hi! My name is Shadi Abou-Zahra.')
        ->assertSee('href="https://www.w3.org/WAI/videos/standards-and-benefits/"', false)
        ->assertSee('aria-label="Username"', false)
        ->assertSee('placeholder="Project title"', false)
        ->assertSee('Experience level')
        ->assertSee('alt="Lab photo"', false)
        ->assertSee('alt="Electronics testing bench with a microcontroller, multimeter, and soldering station"', false)
        ->assertSee('Please check the highlighted fields.')
        ->assertSee('Orientation request sent.')
        ->assertSee('role="button" aria-pressed="false" data-filter="printing"', false)
        ->assertSee('scope="col"', false)
        ->assertSee('scope="row"', false)
        ->assertDontSee('<track', false)
        ->assertDontSee('makermap-orientation.mp4')
        ->assertDontSee('Welcome to the creative district')
        ->assertDontSee('aria-live="polite" hidden>Orientation request sent.', false);

    expect(substr_count($html, '<details class="maker-disclosure">'))->toBe(3);
    expect(substr_count($html, 'data-disclosure='))->toBe(1);
    expect(substr_count($html, 'data-filter='))->toBe(6);
    expect(preg_match('/<img class="maker-space-image" src="[^"]+">/', $html))->toBe(1);
    expect($html)->toContain('<div class="maker-section-title" id="available-spaces-title">Available Spaces</div>');
    expect($html)->not->toContain('<h2 id="available-spaces-title">');
});

test('the public brief requires all twenty issues without exposing their locations or answers', function () {
    $this->get('/modules/5/challenge')
        ->assertOk()
        ->assertSee('Individual Challenge · 10 points')
        ->assertSee('MakerMap contains 20 deliberate accessibility issues')
        ->assertSee('identify all 20')
        ->assertSee('across Modules 01–05')
        ->assertSee('Use MakerMap to find a creative space')
        ->assertSee('Automated output is not proof of accessibility.')
        ->assertSee('AI output is not evidence.')
        ->assertSee('Review Record')
        ->assertSee('All 20 Findings')
        ->assertSee('Top Five Priorities')
        ->assertSee('One Thing You Would Not Call a Failure')
        ->assertSee('Testing process · 1 point')
        ->assertDontSee('Safety orientation certification required')
        ->assertDontSee('Available Spaces is styled')
        ->assertDontSee('Design Futures');
});

test('the instructor key contains exactly twenty numbered findings across all five modules', function () {
    $key = Course::instructorModule(5)['sample_experience'];
    $findings = $key['answer_key'];

    expect($findings)->toHaveCount(20)
        ->and(array_column($findings, 'number'))->toBe(range(1, 20))
        ->and(array_values(array_unique(array_column($findings, 'module'))))->toBe(['Module 01', 'Module 02', 'Module 03', 'Module 04', 'Module 05'])
        ->and($key['intentionally_correct'])->not->toBeEmpty()
        ->and($key['non_failures'])->not->toBeEmpty();

    $this->get('/instructor/modules/5/answer-key')
        ->assertOk()
        ->assertSee('Total deliberate issues: 20')
        ->assertSee('Intentionally Correct Features')
        ->assertSee('Not Automatically Failures')
        ->assertSee('MakerMap');

    $this->get('/modules/5')
        ->assertOk()
        ->assertDontSee('/instructor/modules/5/answer-key');
});

test('the syllabus and Challenge 05 course data use the revised 10-point contract', function () {
    expect(Course::module(5)['challenge']['evaluation_total'])->toBe(10);

    $this->get('/syllabus')
        ->assertOk()
        ->assertSee('individual, 10-point comprehensive accessibility review')
        ->assertSee('identify all deliberate issues')
        ->assertDontSee('20-point assignment')
        ->assertDontSee('eight strongest findings');
});
