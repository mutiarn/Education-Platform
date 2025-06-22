<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{
    public function show($courseId, $lessonId)
    {
        // Dummy
        return view('teachers.course.lesson', [
            'courseId' => $courseId,
            'lessonId' => $lessonId,
        ]);
    }

}
