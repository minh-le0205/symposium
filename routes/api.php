<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TalkController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::name('talks.api.')->prefix('talks')->group(function () {
        Route::apiResource('/', TalkController::class);
    });
});
