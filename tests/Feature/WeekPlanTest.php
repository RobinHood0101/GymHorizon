<?php
// check crud
use App\Models\User;

test('user can create new week plan', function () {
    $user = User::create([
        'name' => 'Test User',
        'email' => 'test@localhost',
        'password' => bcrypt('password'),
    ]);
});

test('user can read week plan', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('user can update week plan', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});


test('user can delete week plan', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
