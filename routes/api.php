<?php

use App\Http\Controllers\Api\AuthController;
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


Route::post('/check-code', [AuthController::class, 'CheckCode']);
Route::post('/register', [AuthController::class, 'Register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/change-password', [AuthController::class, 'change_password']);
Route::get('/user-notification', [AuthController::class, 'UserNotification']);
Route::get('/get-profile', [AuthController::class, 'get_profile_data']);
