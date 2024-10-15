<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\TaskController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


// Login
Route::post('/login', [LoginController::class, 'login']);


Route::apiResource('tasks', TaskController::class)->middleware('auth:api');
