<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Str;

class LessonController extends Controller
{
    public function show(Course $course, Lesson $lesson)
    {
        if ($lesson->course_id !== $course->id) {
            abort(404);
        }

        $lessons = $course->lessons()->orderBy('order')->get();
        $currentIndex = $lessons->search(fn($l) => $l->id === $lesson->id);
        $previousLesson = $lessons->get($currentIndex - 1);
        $nextLesson = $lessons->get($currentIndex + 1);

        // Convert video URL
        $embedUrl = $this->getEmbedUrl($lesson->video_url);

        return view('teachers.course.lesson', compact(
            'course', 'lesson', 'previousLesson', 'nextLesson', 'embedUrl'
        ));
    }

    private function getEmbedUrl($url)
    {
        if (Str::startsWith($url, 'https://youtu.be/')) {
            return str_replace('https://youtu.be/', 'https://www.youtube.com/embed/', $url);
        }
        if (Str::contains($url, 'watch?v=')) {
            return preg_replace('/watch\\?v=/', 'embed/', $url);
        }
        return $url;
    }


}
