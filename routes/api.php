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

Route::get('/courses', [ApiController::class, 'landingCourses'])->name("landing.courses");
Route::middleware('auth:sanctum')->group(function() {
    Route::get('/preview/course/{id}', [ApiController::class, 'previewMode'])->name('preview.course');
    Route::get('/lesson/finished/{id}', [ApiController::class, 'lessonFinished'])->name('lesson.finished');
    Route::get('/learning/course/{id}', [ApiController::class, 'learningMode'])->name('learning.mode');
    Route::get('/user/profile', [ApiController::class, 'userProfile'])->name('user.profile');
    Route::get('/courses/board', [ApiController::class, 'coursesBoard'])->name('courses.board');
    Route::get('/interests', [ApiController::class, 'allInterests'])->name('all.interests');
    Route::get('/professor/dashboard', [ApiController::class, 'professorDashboard'])->name('professor.dashboard');
});

