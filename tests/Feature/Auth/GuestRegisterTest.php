<?php


test('new guests can register', function () {
    $response = $this->post('/guest-register', [
        'name' => 'Test User'
    ]);

    $this->assertAuthenticated();
    $response->assertStatus(302);

    $this->assertDatabaseHas('users', [
        'name' => 'Test User',
        'is_guest' => true
    ]);
});
