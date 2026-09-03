<?php

test('the changelog page is publicly accessible', function () {
    $response = $this->get('/changelog');

    $response->assertOk();
    $response->assertSee('Changelog');
});
