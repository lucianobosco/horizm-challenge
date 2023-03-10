<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('posts')->group(function () {
    Route::post('/migrate', [PostController::class, 'migrate']);
    Route::get('/top', [PostController::class, 'showTop']);
    Route::get('/{post:id}', [PostController::class, 'show']);
});

Route::prefix('users')->group(function () {
    Route::post('/migrate', [UserController::class, 'migrate']);
    Route::get('/', [UserController::class, 'index']);
});