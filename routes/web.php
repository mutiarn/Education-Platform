<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\DashboardController;
use App\Http\Controllers\Teacher\CoursesController;
use App\Http\Controllers\Teacher\QuizController;
use App\Http\Controllers\Teacher\StudentController;
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
        Route::get('/create/{course}', [QuizController::class, 'create'])->name('teacher.quiz.create');
        Route::post('/store/{course}', [QuizController::class, 'store'])->name('teacher.quiz.store');

        Route::get('/{quiz}', [QuizController::class, 'show'])->name('teacher.quiz.show'); // 👈 ini baru ditambah

        Route::get('/{quiz}/edit', [QuizController::class, 'edit'])->name('teacher.quiz.edit');
        Route::put('/{quiz}', [QuizController::class, 'update'])->name('teacher.quiz.update');
        Route::delete('/{quiz}', [QuizController::class, 'destroy'])->name('teacher.quiz.destroy');

        // Quiz Questions
        Route::get('/{quiz}/questions/create', [QuizController::class, 'createQuestion'])->name('teacher.quiz.questions.create');
        Route::post('/{quiz}/questions/store', [QuizController::class, 'storeQuestion'])->name('teacher.quiz.questions.store');
        Route::get('/{quiz}/questions/{question}/edit', [QuizController::class, 'editQuestion'])->name('teacher.quiz.questions.edit');
    });

    Route::get('/students', [StudentController::class, 'index'])->name('teacher.students');

    Route::get('/profile/settings', fn () => view('profile.profile'))->name('profile.settings');
    Route::get('/profile/edit', fn () => view('profile.edit'))->name('profile.edit');

   
});

