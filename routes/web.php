<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Teacher\DashboardController;
use App\Http\Controllers\Teacher\CoursesController;
use App\Http\Controllers\Teacher\LessonController;
use App\Http\Controllers\Teacher\QuizController;
use App\Http\Controllers\Teacher\StudentController;

/*
|--------------------------------------------------------------------------
| Public Routes (Tanpa login)
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('landing-page'))->name('landing-page');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 📢 Berita & Kategori - untuk publik
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');
Route::get('/category/{category}', [NewsController::class, 'category'])->name('news.category');

/*
|--------------------------------------------------------------------------
| Protected Routes (Login Required)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // 👤 Profile (Semua role)
    Route::get('/profile/settings', fn () => view('profile.profile'))->name('profile.settings');
    Route::get('/profile/edit', fn () => view('profile.edit'))->name('profile.edit');
    Route::post('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');

    /*
    |--------------------------------------------------------------------------
    | ADMIN Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', fn () => view('admin.dashboard'))->name('dashboard');
        Route::resource('news', AdminNewsController::class);             // admin.news.*
        Route::resource('categories', AdminCategoryController::class);   // admin.categories.*
    });

    /*
    |--------------------------------------------------------------------------
    | TEACHER Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('teacher')->name('teacher.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // 📝 Courses
        Route::prefix('courses')->group(function () {
            Route::get('/', [CoursesController::class, 'index'])->name('courses');
            Route::get('/create', [CoursesController::class, 'create'])->name('courses.create');
            Route::post('/store', [CoursesController::class, 'store'])->name('courses.store');
            Route::get('/{id}', [CoursesController::class, 'show'])->name('courses.show');
            Route::get('/{id}/edit', [CoursesController::class, 'edit'])->name('courses.edit');
            Route::put('/{id}', [CoursesController::class, 'update'])->name('courses.update');
            Route::delete('/{id}', [CoursesController::class, 'destroy'])->name('courses.destroy');

            // 📚 Lesson show
            Route::get('/{course}/lessons/{lesson}', [LessonController::class, 'show'])->name('courses.lessons.show');
        });

        // 🧠 Quiz
        Route::prefix('quiz')->group(function () {
            Route::get('/', [QuizController::class, 'index'])->name('quiz');
            Route::get('/create/{course}', [QuizController::class, 'create'])->name('quiz.create');
            Route::post('/store/{course}', [QuizController::class, 'store'])->name('quiz.store');
            Route::get('/{quiz}', [QuizController::class, 'show'])->name('quiz.show');
            Route::get('/{quiz}/edit', [QuizController::class, 'edit'])->name('quiz.edit');
            Route::put('/{quiz}', [QuizController::class, 'update'])->name('quiz.update');
            Route::delete('/{quiz}', [QuizController::class, 'destroy'])->name('quiz.destroy');

            // ❓ Quiz Questions
            Route::get('/{quiz}/questions/create', [QuizController::class, 'createQuestion'])->name('quiz.questions.create');
            Route::post('/{quiz}/questions/store', [QuizController::class, 'storeQuestion'])->name('quiz.questions.store');
            Route::get('/{quiz}/questions/{question}/edit', [QuizController::class, 'editQuestion'])->name('quiz.questions.edit');
        });

        // 👨‍🎓 Student list
        Route::get('/students', [StudentController::class, 'index'])->name('students');
    });

    /*
    |--------------------------------------------------------------------------
    | Global Dashboard Redirect
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', function () {
        $role = Auth::user()->role->name;
        return redirect()->route("{$role}.dashboard");
    })->name('dashboard');
});
