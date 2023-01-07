<?php

use function Pest\Laravel\post;
use App\Models\User;
use Illuminate\Http\Response;

test('user can login with valid credentials', function () {
    
    $response = post(route('auth.login'), [
        'email' => 'm_akkurt@live.com',
        'password' => 'password'
    ]);
    
    $response->assertStatus(Response::HTTP_OK);
    $response->assertJsonStructure([
        'data' => [
            'token123', 'token_type'
        ]
    ]);

});

test('user can not login with invalid credentials', function () {
    
    $response = post(route('auth.login'), [
        'email' => 'm_akkurt@12345.com',
        'password' => 'password'
    ]);
    
    $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
});

test('user can not login with fake email even thought it already exist in database', function () {
    
    $email = 'example@example.com';
    
    User::factory(['email' => $email])->create();
    
    $response = post(route('auth.login'), [
        'email' => $email,
        'password' => 'password'
    ]);
    
    $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
});

test('user can not login with empty request', function () {
    
    $response = post(route('auth.login'), []);
    
    $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
});

test('user can not login with without email', function () {
    
    $response = post(route('auth.login'), [
        'password' => 'password'
    ]);
    
    $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
});

test('user can not login with without password', function () {
    
    $response = post(route('auth.login'), [
        'email' => 'm_akkurt@live.com',
    ]);
    
    $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
});