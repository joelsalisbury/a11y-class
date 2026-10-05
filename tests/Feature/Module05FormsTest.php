<?php

use App\Support\Course;

it('publishes the current Module 05 content and the interactive Design Futures challenge', function () {
    expect(Course::current())->toBe(['module' => 5, 'session' => 10]);

    $this->get('/')
        ->assertOk()
        ->assertSee('Module 05')
        ->assertSee('Session 10');

    $this->get('/modules/5')
        ->assertOk()
        ->assertSee('What Does the Interface Actually Say?')
        ->assertSee('What Is the Form Asking For?')
        ->assertSee('Can You Use It Without the Visual Interface?')
        ->assertSee('Challenge 05')
        ->assertDontSee('Module 05 Key Concepts')
        ->assertDontSee('Form Clarity Lab');

    $this->get('/modules/5/session-10')
        ->assertOk()
        ->assertSee('What Is the Form Asking For?')
        ->assertSee('UConn Accessibility Tools')
        ->assertSee('What does the form need from the user before the first submit?')
        ->assertSee('WebAIM NVDA Guide')
        ->assertSee('labels')
        ->assertSee('instructions')
        ->assertDontSee('Open Screen Reader Lab')
        ->assertDontSee('Form Clarity Lab');

    $this->get('/experiences/module-05/screen-reader-lab')
        ->assertOk()
        ->assertSee('Screen Reader Lab')
        ->assertSee('Navigate by headings rather than reading from the top.')
        ->assertSee('Find the control without pointing at it with the mouse.')
        ->assertSee('Navigate to the field without using the mouse and listen before typing.')
        ->assertSee('Does what you hear preserve the purpose of the image?');

    $this->get('/modules/5/session-11')
        ->assertOk()
        ->assertSee('Can You Use It Without the Visual Interface?')
        ->assertSee('What does the interface communicate when you navigate it primarily through a screen reader?')
        ->assertSee('Accessibility Bookmarklets')
        ->assertSee('NVDA')
        ->assertSee('VoiceOver')
        ->assertDontSee('Error & Recovery Lab');

    $this->get('/field-guide')
        ->assertOk()
        ->assertSee('UConn Accessibility Tools')
        ->assertSee('NVDA')
        ->assertSee('VoiceOver')
        ->assertSee('Accessibility Bookmarklets')
        ->assertSee('Accessibility Testing Workflow');

    $this->get('/experiences/module-05/form-clarity-lab')
        ->assertOk()
        ->assertSee('Form Clarity Lab')
        ->assertSee('What Is This Field Actually Called?')
        ->assertSee('Did the Instructions Come With the Field?')
        ->assertSee('Example 3: Which')
        ->assertSee('Is Required Actually Required?')
        ->assertSee('What Does the Browser Know About This Field?')
        ->assertSee('Screen Reader Quick Start');

    $this->get('/experiences/module-05/error-recovery-lab')
        ->assertOk()
        ->assertSee('Error & Recovery Lab')
        ->assertSee('Something Went Wrong')
        ->assertSee('One Mistake, Start Over')
        ->assertSee('Are You Sure?');

    $this->get('/modules/5/key-concepts')
        ->assertStatus(404);

    $this->get('/modules/5/key-concepts/semantic-structure-matters')
        ->assertStatus(404);

    $this->get('/modules/5/challenge')
        ->assertOk()
        ->assertSee('Challenge 05: When the Interface Fails the User')
        ->assertSee('What does an interface owe the user when something goes wrong?')
        ->assertSee('Individual Challenge')
        ->assertSee('Complete the registration once using the interface normally.')
        ->assertSee('The challenge is worth 20 points.')
        ->assertSee('AI output is not evidence.')
        ->assertSee('4–6 pages');

    $this->get('/experiences/module-05/design-futures-registration')
        ->assertOk()
        ->assertSee('Design Futures 2026 Registration')
        ->assertSee('Explore the Event')
        ->assertSee('Choose a Workshop')
        ->assertSee('Register')
        ->assertSee('Review and Submit')
        ->assertSee('Accessibility verified: WAVE found 0 errors. This site meets WCAG 2.1 AA and Section 508 requirements.')
        ->assertSee('Reset experience')
        ->assertSee('Return to Challenge 05')
        ->assertDontSee('intentionally realistic and imperfect');

    $this->get('/instructor/modules/5/answer-key')
        ->assertOk()
        ->assertSee('Instructor-only reference')
        ->assertSee('Sample experience defect key')
        ->assertSee('Module 01')
        ->assertSee('Module 05');
});
