<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;

class StudentController extends Controller
{
    public function index()
    {
        $teacherId = 1;

        $courses = Course::with('students')->where('teacher_id', $teacherId)->get();

        $students = collect();
        foreach ($courses as $course) {
            foreach ($course->students as $student) {
                $students->push([
                    'name' => $student->name,
                    'email' => $student->email,
                    'course' => $course->title,
                ]);
            }
        }

        return view('teachers.student', compact('students'));
    }

}
