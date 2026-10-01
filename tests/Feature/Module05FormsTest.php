<?php

it('publishes the upcoming Module 05 content for forms and recovery', function () {
    $this->get('/modules/5')
        ->assertOk()
        ->assertSee('What Happens When Something Goes Wrong?')
        ->assertSee('What Does This Form Want From Me?')
        ->assertSee('What Happens When You Get It Wrong?')
        ->assertSee('Challenge 05');

    $this->get('/modules/5/session-10')
        ->assertOk()
        ->assertSee('What Does This Form Want From Me?')
        ->assertSee('Form Investigation Lab')
        ->assertSee('visible labels')
        ->assertSee('accessible name');

    $this->get('/modules/5/session-11')
        ->assertOk()
        ->assertSee('What Happens When You Get It Wrong?')
        ->assertSee('Error & Recovery Lab')
        ->assertSee('Barrier → affected interaction/user → evidence → proposed remediation → method of verification');

    $this->get('/modules/5/challenge')
        ->assertOk()
        ->assertSee('Challenge 05')
        ->assertSee('Barrier')
        ->assertSee('WCAG-supported accessibility failure')
        ->assertSee('broader accessibility/usability concern');
});
