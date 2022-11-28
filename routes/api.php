<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WhatsappController;


use App\Http\Controllers\Api\v1\ChatsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::prefix('session')->group(function () {
        Route::get('status', [WhatsappController::class, 'status']);
        Route::post('create', [WhatsappController::class, 'create']);
        Route::post('close', [WhatsappController::class, 'close']);
    });

    Route::prefix('chats')->group(function () {
        Route::post('send', [ChatsController::class, 'send']);
    });
});
