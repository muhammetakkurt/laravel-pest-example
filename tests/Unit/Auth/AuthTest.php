<?php

use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\AuthService;
use Illuminate\Support\Facades\Validator;

test('user can login with valid credentials', function () {
    
    $requestBody = [
        'email' => 'm_akkurt@live.com',
        'password' => 'password'
    ];

    $generatedRequest = new LoginRequest();
    $generatedRequest->setContainer(app());
    $generatedRequest->initialize($requestBody);
    $generatedRequest->setValidator(Validator::make($generatedRequest->all(), $generatedRequest->rules()));


    $authService = (new AuthService())->login($generatedRequest);
    expect($authService)->token->toBeString();
    expect($authService)->token_type->toBeString();
    expect($authService)->token_type->toBe('Bearer');

});
