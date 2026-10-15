<?php

test('the changelog page is publicly accessible', function () {
    $response = $this->get('/changelog');

    $response->assertOk();
    $response->assertSee('Changelog');
    $response->assertSee('Clarified Session 13 key dates');
    $response->assertSee('Updated Session 13 to introduce the Accessibility Studio format');
    $response->assertSee('Rebuilt the Session 13 cognitive-load demonstration');
    $response->assertSee('Revised Session 13 to restore cognitive accessibility instruction');
});
