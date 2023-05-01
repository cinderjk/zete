<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\SessionController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\ContactController;

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('session')->group(function () {
        Route::get('status', [SessionController::class, 'status']);
        Route::post('create', [SessionController::class, 'create']);
        Route::post('close', [SessionController::class, 'close']);
    });

    Route::prefix('messages')->group(function () {
        Route::get('/', [MessageController::class, 'list']);
        Route::post('send', [MessageController::class, 'send']);
    });

    Route::prefix('contacts')->group(function () {
        Route::get('/', [ContactController::class, 'list']);
        Route::get('check', [ContactController::class, 'checkNumber']);
        Route::post('block', [ContactController::class, 'blockContact']);
    });
});
