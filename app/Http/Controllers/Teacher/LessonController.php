<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function show(Course $course, Lesson $lesson)
    {
        // Optional: validasi apakah lesson memang milik course
        if ($lesson->course_id !== $course->id) {
            abort(404);
        }

        // Get previous and next lesson if needed
        $lessons = $course->lessons()->orderBy('order')->get();
        $currentIndex = $lessons->search(fn($l) => $l->id === $lesson->id);
        $previousLesson = $lessons->get($currentIndex - 1);
        $nextLesson = $lessons->get($currentIndex + 1);

        return view('teachers.course.lesson', compact('course', 'lesson', 'previousLesson', 'nextLesson'));
    }


}
