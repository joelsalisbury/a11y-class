<?php

test('the changelog page is publicly accessible', function () {
    $response = $this->get('/changelog');

    $response->assertOk();
    $response->assertSee('Changelog');
    $response->assertSee('Rebuilt the Session 13 cognitive-load demonstration');
    $response->assertSee('Revised Session 13 to restore cognitive accessibility instruction');
});
