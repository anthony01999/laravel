<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ShowroomController;
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

Route::get('showrooms', [ShowroomController::class, 'index']);
Route::post('showrooms', [ShowroomController::class, 'store']);
Route::put('showrooms/{id}', [ShowroomController::class, 'update']);
Route::get('showrooms/{id}', [ShowroomController::class, 'show']);
Route::delete('showrooms/{id}', [ShowroomController::class, 'destroy']);

Route::get('cars', [CarController::class, 'index']);
Route::post('cars', [CarController::class, 'store']);
Route::put('cars/{id}', [CarController::class, 'update']);
Route::get('cars/{id}', [CarController::class, 'show']);
Route::delete('cars/{id}', [CarController::class, 'destroy']);
