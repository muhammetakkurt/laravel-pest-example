<?php

use Illuminate\Support\Facades\Validator;

uses(Tests\TestCase::class)->in('Feature');
uses(Tests\TestCase::class)->in('Unit');

function createRequest($class, $requestBody){
    $createdRequest = new $class;
    $createdRequest->setContainer(app());
    $createdRequest->initialize($requestBody);
    $createdRequest->setValidator(Validator::make($createdRequest->all(), $createdRequest->rules()));
    return $createdRequest;
}