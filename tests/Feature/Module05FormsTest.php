<?php

use App\Support\Course;

it('publishes the current Module 05 content and the semantic-structure teaching flow', function () {
    expect(Course::current())->toBe(['module' => 5, 'session' => 10]);

    $this->get('/')
        ->assertOk()
        ->assertSee('Module 05')
        ->assertSee('Session 10');

    $this->get('/modules/5')
        ->assertOk()
        ->assertSee('What Is the Interface Actually Made Of?')
        ->assertSee('Can You Use It Without the Visual Interface?')
        ->assertSee('Challenge 05')
        ->assertDontSee('Form Clarity Lab')
        ->assertDontSee('Error & Recovery Lab')
        ->assertDontSee('Module 05 Key Concepts');

    $this->get('/modules/5/session-10')
        ->assertOk()
        ->assertSee('What Is the Interface Actually Made Of?')
        ->assertSee('When two interfaces look the same, what makes them different to the browser and assistive technology?')
        ->assertSee('CSS controls appearance. HTML communicates structure.')
        ->assertSee('Native controls already know how to behave.')
        ->assertSee('Start Your Review')
        ->assertSee('two or three candidate observations')
        ->assertSee('Do not begin by dumping an automated-tool report into your assignment.')
        ->assertSee('Next: Test What You Cannot See')
        ->assertSee('UConn Accessibility Tools')
        ->assertSee('Accessibility Bookmarklets')
        ->assertDontSee('Form Clarity Lab')
        ->assertDontSee('Open Screen Reader Lab');

    $this->get('/modules/5/session-11')
        ->assertOk()
        ->assertSee('Can You Use It Without the Visual Interface?')
        ->assertSee('What does the interface communicate when you navigate it primarily through a screen reader?')
        ->assertSee('Next: Listen to It')
        ->assertDontSee('Error & Recovery Lab');

    $this->get('/field-guide')
        ->assertOk()
        ->assertSee('UConn Accessibility Tools')
        ->assertSee('Accessibility Bookmarklets')
        ->assertSee('Accessibility Testing Workflow');

    $this->get('/experiences/module-05/structure-demo')
        ->assertOk()
        ->assertSee('Semantic Structure Bench')
        ->assertSee('If these look the same, does the browser understand them the same way?')
        ->assertSee('Is It Actually a Heading?')
        ->assertSee('Is This a List?')
        ->assertSee('Is This Navigation?')
        ->assertSee('Is This a Label or Just Text?')
        ->assertSee('Are These in the Same Group?')
        ->assertSee('Is This the Main Content?');

    $this->get('/experiences/module-05/controls-demo')
        ->assertOk()
        ->assertSee('Link or Button?')
        ->assertSee('What Comes For Free?')
        ->assertSee('They can look almost identical. Are they the same control?')
        ->assertSee('Appearance does not determine semantics.')
        ->assertSee('Native controls already know how to behave.')
        ->assertDontSee('What Is This Button Called?')
        ->assertDontSee('What State Is It In?')
        ->assertDontSee('Course actions')
        ->assertDontSee('Look at these actions carefully.')
        ->assertDontSee('Name, role, and state are information about an interaction, not decoration.');

    $this->get('/experiences/module-05/form-demo')
        ->assertOk()
        ->assertSee('Workshop Registration')
        ->assertSee('Full name (required)')
        ->assertSee('Email address (required)')
        ->assertSee('Phone number')
        ->assertSee('Workshop choice (required)')
        ->assertSee('Accessibility or dietary needs')
        ->assertSee('Check your registration')
        ->assertSee('What to Notice')
        ->assertSee('Under the Hood')
        ->assertSee('Start over')
        ->assertDontSee('What does the user need to know before they enter the value?')
        ->assertDontSee('How much work should one mistake cost the user?')
        ->assertDontSee('An error message has to help the user recover.');

    $this->get('/modules/5/key-concepts')
        ->assertStatus(404);

    $this->get('/modules/5/key-concepts/semantic-structure-matters')
        ->assertStatus(404);

    $this->get('/modules/5/challenge')
        ->assertOk()
        ->assertSee('Challenge 05: Accessibility Review')
        ->assertSee('What can you establish about the accessibility of an interactive experience, and what evidence supports your conclusions?')
        ->assertSee('Individual Challenge · 20 points')
        ->assertSee('AI output is not evidence.')
        ->assertSee('5–7 pages');

    $this->get('/experiences/module-05/design-futures-registration')
        ->assertOk()
        ->assertSee('Design Futures 2026 Registration')
        ->assertSee('Explore the Event')
        ->assertSee('Choose a Workshop')
        ->assertSee('Register')
        ->assertSee('Review and Submit');

    $this->get('/instructor/modules/5/answer-key')
        ->assertOk()
        ->assertSee('Instructor-only reference')
        ->assertSee('Sample experience defect key')
        ->assertSee('Module 01')
        ->assertSee('Module 05');
});
