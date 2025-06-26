@extends('layouts.teacher')

@section('title', 'My Quizzes')
@section('header', 'My Quizzes')

@section('content')
<div class="w-full max-w-7xl mx-auto bg-white dark:bg-gray-800 px-10 py-10 rounded-lg shadow">
    <h1 class="text-3xl font-semibold mb-8 text-gray-800 dark:text-white">My Quizzes</h1>

    <p class="text-gray-600 dark:text-gray-300 mb-6">
        Berikut adalah daftar kursus yang kamu kelola. Tetap semangat membagikan ilmu! 💡
    </p>

    @foreach ($courses as $course)
        @if ($course->quiz)
            <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow mb-4 flex justify-between items-start">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $course->title }}</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        🕒 Duration: {{ $course->quiz->duration }} minutes<br>
                        📄 {{ $course->quiz->questions->count() }} questions
                    </p>
                </div>
                <div class="space-x-2 text-right">
                    <a href="{{ route('teacher.quiz.show', $course->quiz->id) }}" class="text-blue-600 hover:underline">View</a>
                    <a href="{{ route('teacher.quiz.edit', $course->quiz->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                    <form action="{{ route('teacher.quiz.destroy', $course->quiz->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this quiz?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        @else
            <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow mb-4 flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $course->title }}</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada quiz untuk kursus ini.</p>
                </div>
                <a href="{{ route('teacher.quiz.create', $course->id) }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Add Quiz
                </a>
            </div>
        @endif
    @endforeach
</div>
@endsection



