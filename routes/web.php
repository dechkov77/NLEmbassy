<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('admin/courses/index', [CourseController::class, 'index'])->name('courses.index');
Route::get('admin/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('admin/courses/store', [CourseController::class, 'store'])->name('courses.store');
Route::get('admin/courses/edit/{id}', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('admin/courses/update/{id}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('admin/courses/destroy/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

Route::get('admin/modules/index', [ModuleController::class, 'index'])->name('modules.index');
Route::get('admin/modules/create', [ModuleController::class, 'create'])->name('modules.create');
Route::post('admin/modules/store', [ModuleController::class, 'store'])->name('modules.store');
Route::get('admin/modules/edit/{id}', [ModuleController::class, 'edit'])->name('modules.edit');
Route::put('admin/modules/update/{id}', [ModuleController::class, 'update'])->name('modules.update');
Route::delete('admin/modules/destroy/{id}', [ModuleController::class, 'destroy'])->name('modules.destroy');

Route::get('admin/lessons/index', [LessonController::class, 'index'])->name('lessons.index');
Route::get('admin/lessons/create', [LessonController::class, 'create'])->name('lessons.create');
Route::post('admin/lessons/store', [LessonController::class, 'store'])->name('lessons.store');
Route::get('admin/lessons/edit/{id}', [LessonController::class, 'edit'])->name('lessons.edit');
Route::put('admin/lessons/update/{id}', [LessonController::class, 'update'])->name('lessons.update');
Route::delete('admin/lessons/destroy/{id}', [LessonController::class, 'destroy'])->name('lessons.destroy');

Route::get('admin/achievements/index', [AchievementController::class, 'index'])->name('achievements.index');
Route::get('admin/achievements/create', [AchievementController::class, 'create'])->name('achievements.create');
Route::post('admin/achievements/store', [AchievementController::class, 'store'])->name('achievements.store');
Route::get('admin/achievements/edit/{id}', [AchievementController::class, 'edit'])->name('achievements.edit');
Route::put('admin/achievements/update/{id}', [AchievementController::class, 'update'])->name('achievements.update');
Route::delete('admin/achievements/destroy/{id}', [AchievementController::class, 'destroy'])->name('achievements.destroy');

Route::get('admin/interests/index', [InterestController::class, 'index'])->name('interests.index');
Route::get('admin/interests/create', [InterestController::class, 'create'])->name('interests.create');
Route::post('admin/interests/store', [InterestController::class, 'store'])->name('interests.store');
Route::get('admin/interests/edit/{id}', [InterestController::class, 'edit'])->name('interests.edit');
Route::put('admin/interests/update/{id}', [InterestController::class, 'update'])->name('interests.update');
Route::delete('admin/interests/destroy/{id}', [InterestController::class, 'destroy'])->name('interests.destroy');

Route::get('/test', function() {
    $user = User::find(2);

    dd($user->courses);
});

require __DIR__.'/auth.php';
