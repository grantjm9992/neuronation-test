<?php

use App\Infrastructure\Controllers\Auth\LoginController;
use App\Infrastructure\Controllers\Auth\RegisterController;
use App\Infrastructure\Controllers\AuthController;
use App\Infrastructure\Controllers\History\GetCategoriesForLastSessionController;
use App\Infrastructure\Controllers\History\GetSessionHistoryController;
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

Route::post(
    uri: 'login',
    action: LoginController::class,
);

Route::post(
    uri: 'register',
    action: RegisterController::class,
);

Route::controller(AuthController::class)->group(function () {
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});


Route::middleware('jwt.verify')->group(function() {
    Route::get('session/history', GetSessionHistoryController::class);
    Route::get('session/latest-categories', GetCategoriesForLastSessionController::class);
});
