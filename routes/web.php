<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\DashboardController;
use App\Http\Controllers\Teacher\CoursesController;
use App\Http\Controllers\Teacher\QuizController;
use App\Http\Controllers\Teacher\StudentController;
use App\Http\Controllers\Teacher\InboxController;

Route::prefix('teacher')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('teacher.dashboard');
    Route::get('/courses', [CoursesController::class, 'index'])->name('teacher.courses');
    Route::get('/quiz', [QuizController::class, 'index'])->name('teacher.quiz');
    Route::get('/students', [StudentController::class, 'index'])->name('teacher.students');
    Route::get('/inbox', [InboxController::class, 'index'])->name('teacher.inbox');
});

