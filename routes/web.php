<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProfileController;
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

require __DIR__.'/auth.php';
