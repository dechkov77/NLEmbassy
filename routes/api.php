<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/courses', [ApiController::class, 'landingCourses'])->name("landing.courses");


Route::middleware('auth:sanctum')->group( function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/preview/course/{id}', [ApiController::class, 'previewMode'])->name('preview.course');
    Route::get('/lesson/finished/{id}', [ApiController::class, 'lessonFinished'])->name('lesson.finished');
    Route::get('/learning/course/{id}', [ApiController::class, 'learningMode'])->name('learning.mode');
});

