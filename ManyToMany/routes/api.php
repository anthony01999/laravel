<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentCourseController;

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

Route::post('users', [UserController::class, 'store']);

Route::get('students', [StudentController::class, 'index']);
Route::post('students', [StudentController::class, 'store']);

Route::get('courses', [CourseController::class, 'index']);
Route::post('courses', [CourseController::class, 'store']);

Route::get('studentcourses', [StudentCourseController::class, 'index']);
Route::post('studentcourses', [StudentCourseController::class, 'store']);
Route::delete('studentcourses/{id}', [StudentCourseController::class, 'destroy']);
