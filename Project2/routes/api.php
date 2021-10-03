<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PersonAddressController;
use App\Http\Controllers\PersonController;
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

Route::get('persons', [PersonController::class, 'index']);
Route::post('persons', [PersonController::class, 'store']);
Route::put('persons/{id}', [PersonController::class, 'update']);

Route::get('cars', [CarController::class, 'index']);
Route::post('cars', [CarController::class, 'store']);
Route::put('cars/{id}', [CarController::class, 'update']);

Route::get('addresses', [AddressController::class, 'index']);
Route::post('addresses', [AddressController::class, 'store']);
Route::put('addresses/{id}', [AddressController::class, 'update']);

Route::get('personaddress', [PersonAddressController::class, 'index']);
Route::post('personaddress', [PersonAddressController::class, 'store']);
