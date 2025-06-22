<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::with('lessons')->get();
        return view('teachers.course.index', compact('courses'));
    }

    public function show($id)
    {
        $course = Course::with('lessons')->findOrFail($id);
        return view('teachers.course.show', [
            'course' => $course
        ]);
    }

    public function create()
    {
        return view('teachers.course.create');
    }
}
