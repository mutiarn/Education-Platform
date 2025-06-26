<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Question;

class QuizController extends Controller
{
    public function index()
    {
        $courses = Course::with('quiz.questions')->get();
        return view('teachers.quiz.index', compact('courses'));
    }

    public function create(Course $course)
    {
        return view('teachers.quiz.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $validated = $request->validate([
            'duration' => 'required|integer|min:1',
            'questions' => 'required|array|min:1',
            'questions.*.question' => 'required|string',
            'questions.*.option_a' => 'required|string',
            'questions.*.option_b' => 'required|string',
            'questions.*.option_c' => 'required|string',
            'questions.*.option_d' => 'required|string',
            'questions.*.correct_option' => 'required|in:a,b,c,d',
        ]);

        $quiz = $course->quiz()->create([
            'title' => 'Quiz for ' . $course->title,
            'description' => $request->input('description'),
            'duration' => $request->input('duration'),
        ]);

        foreach ($validated['questions'] as $q) {
            $quiz->questions()->create([
                'question' => $q['question'],
                'option_a' => $q['option_a'],
                'option_b' => $q['option_b'],
                'option_c' => $q['option_c'],
                'option_d' => $q['option_d'],
                'correct_option' => $q['correct_option'],
            ]);
        }

        return redirect()->route('teacher.quiz', $course->id)
            ->with('success', 'Quiz created successfully.');
    }

    public function edit(Quiz $quiz)
    {
        $courses = Course::all();
        $questionsJson = $quiz->questions->map(function ($q) {
            return [
                'question' => $q->question,
                'option_a' => $q->option_a,
                'option_b' => $q->option_b,
                'option_c' => $q->option_c,
                'option_d' => $q->option_d,
                'correct_option' => $q->correct_option,
            ];
        })->values()->toJson();


        return view('teachers.quiz.edit', compact('quiz', 'courses', 'questionsJson'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'course_id' => 'required|exists:courses,id',
            'questions' => 'nullable|array',
            'questions.*.question' => 'required_with:questions|string',
            'questions.*.option_a' => 'required_with:questions|string',
            'questions.*.option_b' => 'required_with:questions|string',
            'questions.*.option_c' => 'required_with:questions|string',
            'questions.*.option_d' => 'required_with:questions|string',
            'questions.*.correct_option' => 'required_with:questions|in:a,b,c,d',
        ]);

        $quiz->update([
            'title' => $validated['title'],
            'duration' => $validated['duration'],
            'course_id' => $validated['course_id'],
        ]);

        if (isset($validated['questions'])) {
            $quiz->questions()->delete();

            foreach ($validated['questions'] as $q) {
                $quiz->questions()->create([
                    'question' => $q['question'],
                    'option_a' => $q['option_a'],
                    'option_b' => $q['option_b'],
                    'option_c' => $q['option_c'],
                    'option_d' => $q['option_d'],
                    'correct_option' => $q['correct_option'],
                ]);
            }
        }

        return redirect()->route('teacher.quiz')->with('success', 'Quiz updated successfully.');
    }

    public function show(Quiz $quiz)
    {
        $quiz->load('course', 'questions');
        return view('teachers.quiz.show', compact('quiz'));
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('teacher.quiz')->with('success', 'Quiz deleted successfully.');
    }
}
