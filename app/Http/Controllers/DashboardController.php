<?php

namespace App\Http\Controllers;

use App\Models\QuizResult;
use App\Models\Enrollment;
use App\Models\Course;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $teacherId = Auth::id();

        // Total course
        $totalCourses = Course::where('teacher_id', $teacherId)->count();

        // Total quiz
        $totalQuiz = Quiz::whereHas('course', function ($query) use ($teacherId) {
            $query->where('teacher_id', $teacherId);
        })->count();

        // Total student (distinct user_id dari enrollments)
        $totalStudent = Enrollment::whereHas('course', function ($query) use ($teacherId) {
            $query->where('teacher_id', $teacherId);
        })->distinct('user_id')->count('user_id');

        // Quiz activities
        $quizActivities = QuizResult::with(['user', 'quiz.course'])
            ->whereHas('quiz.course', function ($query) use ($teacherId) {
                $query->where('teacher_id', $teacherId);
            })
            ->orderByDesc('submitted_at')
            ->take(5)
            ->get();

        // Enrollment activities
        $enrollmentActivities = Enrollment::with(['user', 'course'])
            ->whereHas('course', function ($query) use ($teacherId) {
                $query->where('teacher_id', $teacherId);
            })
            ->latest()
            ->take(5)
            ->get();

        return view('teacher.dashboard', compact(
            'totalCourses',
            'totalQuiz',
            'totalStudent',
            'quizActivities',
            'enrollmentActivities'
        ));
    }
}
