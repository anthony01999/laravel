<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LineItemController;
use App\Http\Controllers\LineItemDesignController;

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

Route::resource('customers', CustomerController::class);
Route::resource('orders', OrderController::class);
Route::resource('designs', DesignController::class);
Route::resource('lineItems', LineItemController::class);
Route::resource('lineItemDesigns', LineItemDesignController::class);
