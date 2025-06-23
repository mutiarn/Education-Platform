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

    public function edit($id)
    {
        $course = Course::with('lessons')->findOrFail($id);
        $course->lessons = collect($course->lessons)->map(function ($lesson) {
        return [
                    'title' => $lesson['title'] ?? '',
                    'duration' => $lesson['duration'] ?? '',
                    'video_url' => $lesson['video_url'] ?? '',
                    'type' => $lesson['type'] ?? 'video',
                    'is_free' => (bool) ($lesson['is_free'] ?? false),
                ];
        })->values()->toArray(); 
        
        return view('teachers.course.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'level' => 'required',
            'price' => 'required|numeric',
            'video_url' => 'nullable|url',
            'topics' => 'nullable|string',
            'lessons' => 'nullable|array',
            'lessons.*.title' => 'required|string',
            'lessons.*.duration' => 'required|string',
            'lessons.*.video_url' => 'nullable|string',
            'lessons.*.type' => 'required|string|in:video,link,reading',
            'lessons.*.is_free' => 'nullable|boolean',
        ]);

        $course->update($request->only([
            'title', 'description', 'duration', 'level', 'price', 'video_url', 'topics'
        ]));

        // Hapus semua lesson lama
        $course->lessons()->delete();

        // Simpan ulang semua lesson baru
        $lessons = $request->input('lessons', []);

        foreach ($lessons as $index => $lesson) {
            $course->lessons()->create([
                'title' => $lesson['title'],
                'duration' => $lesson['duration'],
                'video_url' => $lesson['video_url'] ?? null,
                'type' => $lesson['type'],
                'is_free' => isset($lesson['is_free']) ? true : false,
                'order' => $index,
            ]);
        }

        return redirect()->route('teacher.courses.show', $id)->with('success', 'Course updated successfully.');
    }
}
