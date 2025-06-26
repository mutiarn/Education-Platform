<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

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

        // Pastikan topics berupa array
        if (is_string($course->topics)) {
            $course->topics = is_string($course->topics) ? explode(',', $course->topics) : $course->topics;
        }

        return view('teachers.course.show', compact('course'));
    }

    public function create()
    {
        return view('teachers.course.create');
    }

    public function edit($id)
    {
        $course = Course::with('lessons')->findOrFail($id);

        $course->lessons = $course->lessons->map(function ($lesson) {
            return [
                'title' => $lesson->title,
                'duration' => $lesson->duration,
                'video_url' => $lesson->video_url,
                'type' => $lesson->type,
                'is_free' => (bool) $lesson->is_free,
            ];
        })->values()->toArray();

        return view('teachers.course.edit', compact('course'));
    }

    public function store(Request $request)
    {
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
            'lessons.*.is_free' => 'nullable|in:true,false,1,0,on',
        ]);

        $course = Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'duration' => $request->duration,
            'level' => $request->level,
            'price' => $request->price,
            'video_url' => $this->convertYoutubeToEmbed($request->video_url),
            'topics' => $request->topics,
            'instructor' => Auth::user()->name ?? 'Unknown',
        ]);


        foreach ($request->input('lessons', []) as $index => $lesson) {
            $course->lessons()->create([
                'title' => $lesson['title'],
                'duration' => $lesson['duration'],
                'video_url' => self::convertYoutubeToEmbed($lesson['video_url'] ?? null),
                'type' => $lesson['type'],
                'is_free' => in_array($lesson['is_free'] ?? false, ['1', 1, true, 'on'], true),
                'order' => $index,
            ]);
        }

        return redirect()->route('teacher.courses')->with('success', 'Course created successfully!');
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
            'lessons.*.is_free' => 'nullable|in:true,false,1,0,on',
        ]);

        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'duration' => $request->duration,
            'level' => $request->level,
            'price' => $request->price,
            'video_url' => $this->convertYoutubeToEmbed($request->video_url),
            'topics' => $request->topics,
        ]);


        $course->lessons()->delete();

        foreach ($request->input('lessons', []) as $index => $lesson) {
            $course->lessons()->create([
                'title' => $lesson['title'],
                'duration' => $lesson['duration'],
                'video_url' => self::convertYoutubeToEmbed($lesson['video_url'] ?? null),
                'type' => $lesson['type'],
                'is_free' => in_array($lesson['is_free'] ?? false, ['1', 1, true, 'on'], true),
                'order' => $index,
            ]);
        }

        return redirect()->route('teacher.courses.show', $id)->with('success', 'Course updated successfully.');
    }

private function convertYoutubeToEmbed($url)
{
    if (!$url) return null;

    // Format: https://www.youtube.com/watch?v=G5kzUpWAusI
    if (preg_match('/youtube\.com\/watch\?v=([^\&]+)/', $url, $matches)) {
        return 'https://www.youtube.com/embed/' . $matches[1];
    }

    // Format: https://youtu.be/G5kzUpWAusI
    if (preg_match('/youtu\.be\/([^\?]+)/', $url, $matches)) {
        return 'https://www.youtube.com/embed/' . $matches[1];
    }

    // Sudah embed
    if (str_contains($url, 'youtube.com/embed')) {
        return $url;
    }

    return null; // fallback kalau bukan format valid
}

public function destroy($id)
{
    $course = Course::findOrFail($id);
    $course->delete();

    return redirect()->route('teacher.courses')->with('success', 'Course deleted successfully.');
}



}
