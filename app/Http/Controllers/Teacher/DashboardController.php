<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Student;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCourses = Course::count();
        $totalQuiz = Quiz::count();
        $totalStudent = Student::count();
        return view('teachers.dashboard', compact('totalCourses', 'totalQuiz', 'totalStudent'));
    }
}
