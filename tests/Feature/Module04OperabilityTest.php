<?php

use App\Support\Course;

it('publishes Module 04 and keeps Session 07 as quiz day', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('Module 04')
        ->assertSee('Session 08')
        ->assertSee('Challenge 04');

    $this->get('/modules/3/session-7')
        ->assertOk()
        ->assertSee('Quiz 1')
        ->assertDontSee('Put the Mouse Away')
        ->assertDontSee('Module 04');

    $this->get('/modules/4')
        ->assertOk()
        ->assertSee('Can You Use It Your Way?')
        ->assertSee('Put the Mouse Away')
        ->assertSee('How Much Precision Does It Require?')
        ->assertSee('Everything Interactive Needs a Keyboard Path')
        ->assertSee('Focus Has to Be Visible')
        ->assertSee('Focus Order Should Follow the Experience')
        ->assertSee('Focusable Does Not Mean Usable')
        ->assertSee('You Have to Be Able to Get Back Out')
        ->assertSee('Do Not Require One Particular Input Method')
        ->assertSee('Challenge 04 Class Work')
        ->assertSee('Cyan Triangle')
        ->assertSee('Amber Circle')
        ->assertSee('Violet Square');

    $this->get('/modules/4/session-8')
        ->assertOk()
        ->assertSee('Can you complete the task without a mouse?')
        ->assertSee('Keyboard access')
        ->assertSee('Reachable Is Not the Same as Usable')
        ->assertSee('Key Concept: Keyboard Path')
        ->assertSee('Key Concept: Focus Visible')
        ->assertSee('Key Concept: Focus Order')
        ->assertSee('Key Concept: Focusable Does Not Mean Usable')
        ->assertSee('Key Concept: Get Back Out')
        ->assertSee('Open Challenge 04');

    $this->get('/modules/4/session-9')
        ->assertOk()
        ->assertSee('What happens when an interaction assumes precise pointing, dragging, or one particular input method?')
        ->assertSee('Target Size (Minimum)')
        ->assertSee('Dragging')
        ->assertSee('Gestures')
        ->assertSee('Key Concept: Do Not Require One Particular Input Method')
        ->assertSee('Finish Challenge 04');

    $conceptSlugs = [
        'everything-interactive-needs-a-keyboard-path',
        'focus-has-to-be-visible',
        'focus-order-should-follow-the-experience',
        'focusable-does-not-mean-usable',
        'you-have-to-be-able-to-get-back-out',
        'do-not-require-one-particular-input-method',
    ];

    foreach ($conceptSlugs as $slug) {
        $this->get('/modules/4/key-concepts/'.$slug)
            ->assertOk()
            ->assertSee('All Key Concepts')
            ->assertSee('Quick Test')
            ->assertSee('Read / Reference')
            ->assertDontSee('screen reader')
            ->assertDontSee('ARIA');
    }

    $this->get('/modules/4/key-concepts')
        ->assertOk()
        ->assertSee('Key Concepts: Operability')
        ->assertSee('Everything Interactive Needs a Keyboard Path')
        ->assertSee('Do Not Require One Particular Input Method');

    $this->get('/modules/4/key-concepts/everything-interactive-needs-a-keyboard-path')
        ->assertSee('Next Concept')
        ->assertDontSee('Previous Concept');

    $this->get('/modules/4/key-concepts/do-not-require-one-particular-input-method')
        ->assertSee('Previous Concept')
        ->assertDontSee('Next Concept');

    $this->get('/modules/4/challenge')
        ->assertOk()
        ->assertSee('Use It Another Way')
        ->assertSee('Can someone complete the same task without relying on one particular way of interacting?')
        ->assertSee('The Task')
        ->assertSee('Assigned Experiences')
        ->assertSee('Course Finder')
        ->assertSee('Prioritize Your Tasks')
        ->assertSee('Find an Event')
        ->assertSee('What Happened')
        ->assertSee('How You Found It')
        ->assertSee('Why It Matters')
        ->assertSee('What You Would Change')
        ->assertSee('approximately three meaningful findings')
        ->assertSee('Complete the task normally.')
        ->assertSee('Investigation')
        ->assertSee('Understanding Target Size (Minimum)')
        ->assertDontSee('Team Assignments')
        ->assertDontSee('Redesign and Retest')
        ->assertDontSee('Intentional barriers');

    $this->get('/modules/4/interaction-lab')
        ->assertOk()
        ->assertSee('Interaction Lab')
        ->assertSee('Cyan Triangle')
        ->assertSee('Amber Circle')
        ->assertSee('Violet Square');

    $this->get('/experiences/module-04/course-finder')
        ->assertOk()
        ->assertSee('Find a course that fits.')
        ->assertSee('Find a course that meets on Tuesday and add it to your shortlist.')
        ->assertSee('Back to Interaction Lab');

    $this->get('/experiences/module-04/task-prioritizer')
        ->assertOk()
        ->assertSee('Prioritize Your Tasks')
        ->assertSee('Put the five tasks in priority order from highest to lowest.')
        ->assertSee('draggable="true"', false)
        ->assertSee('Back to Interaction Lab');

    $this->get('/experiences/module-04/event-browser')
        ->assertOk()
        ->assertSee('Find an Event')
        ->assertSee('Accessibility Workshop')
        ->assertSee('Back to Interaction Lab');

    $this->get('/instructor/modules/4/answer-key')
        ->assertOk()
        ->assertSee('Interaction Lab barrier notes')
        ->assertSee('The Tuesday filter looks interactive but is not keyboard reachable.')
        ->assertSee('Dragging is the only way to reorder the five cards.')
        ->assertSee('Location and time details are revealed only on hover.');

    expect(Course::current())->toBe(['module' => 4, 'session' => 8]);
    expect(Course::module(4)['challenge']['class_work'])->toHaveCount(3);
});
