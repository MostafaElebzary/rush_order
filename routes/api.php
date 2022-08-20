<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\OrderController;
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
//auth
Route::post('/check-code', [AuthController::class, 'CheckCode']);
Route::post('/register', [AuthController::class, 'Register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/change-password', [AuthController::class, 'change_password']);
Route::get('/get-profile', [AuthController::class, 'get_profile_data']);
// Home
Route::get('/user-notification', [AuthController::class, 'UserNotification']);
Route::get('/offers', [HomeController::class, 'Offers']);
Route::get('/main-categories', [HomeController::class, 'MainCategories']);
Route::get('/sub-categories/{id}', [HomeController::class, 'SubCategories']);
Route::get('/branches', [HomeController::class, 'branches']);
Route::get('/branch-categories/{branch_id}', [HomeController::class, 'branch_Categories']);
Route::get('/branch-products/{branch_id}', [HomeController::class, 'branch_products']);
// cart
Route::post('/add-to-cart', [CartController::class, 'AddToCart']);
Route::post('/update-cart', [CartController::class, 'UpdateCart']);
Route::get('/get-cart', [CartController::class, 'getCart']);
Route::get('/delete-cart/{id}', [CartController::class, 'deleteCart']);
Route::get('/add-qty/{id}', [CartController::class, 'AddQty']);
Route::get('/decrease-qty/{id}', [CartController::class, 'DecreaseQty']);

//Order
Route::post('/place-order', [OrderController::class, 'PlaceOrder']);
Route::get('/get-orders', [OrderController::class, 'getOrders']);
Route::get('/delete-order/{id}', [OrderController::class, 'deleteOrder']);
