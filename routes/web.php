<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\DashboardController;
use App\Http\Controllers\Teacher\CoursesController;
use App\Http\Controllers\Teacher\QuizController;
use App\Http\Controllers\Teacher\StudentController;
use App\Http\Controllers\Teacher\InboxController;
use App\Http\Controllers\Teacher\LessonController;

Route::prefix('teacher')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('teacher.dashboard');
    Route::prefix('/courses')->group(function () {
        Route::get('/create', [CoursesController::class, 'create'])->name('teacher.courses.create');
        Route::post('/store', [CoursesController::class, 'store'])->name('teacher.courses.store');

        Route::get('/', [CoursesController::class, 'index'])->name('teacher.courses');
        Route::get('/{id}', [CoursesController::class, 'show'])->name('teacher.courses.show');
        Route::get('/{id}/edit', [CoursesController::class, 'edit'])->name('teacher.courses.edit');
        Route::put('/{id}', [CoursesController::class, 'update'])->name('teacher.courses.update');
        Route::delete('/{id}', [CoursesController::class, 'destroy'])->name('teacher.courses.destroy');
        Route::get('/{course}/lessons/{lesson}', [LessonController::class, 'show'])->name('courses.lessons.show');

    });
    Route::prefix('/quiz')->group(function () {
        Route::get('/', [QuizController::class, 'index'])->name('teacher.quiz');
        // ...
    });
    Route::get('/students', [StudentController::class, 'index'])->name('teacher.students');
    Route::get('/inbox', [InboxController::class, 'index'])->name('teacher.inbox');
});

