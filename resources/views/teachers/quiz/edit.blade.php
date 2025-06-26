@extends('layouts.teacher')

@section('title', 'Edit Quiz')
@section('header', 'Edit Quiz')

@section('content')
<div class="max-w-6xl mx-auto bg-white dark:bg-gray-800 px-10 py-10 rounded-lg shadow space-y-10">
    <h1 class="text-3xl font-semibold text-gray-800 dark:text-white">Edit Quiz</h1>

    <form method="POST" action="{{ route('teacher.quiz.update', $quiz->id) }}">
        @csrf
        @method('PUT')

        {{-- Quiz Title --}}
        <div>
            <label class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Quiz Title</label>
            <input type="text" name="title" value="{{ old('title', $quiz->title) }}"
                class="block w-full px-4 py-3 text-base rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500"
                required>
        </div>

        {{-- Duration --}}
        <div>
            <label class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Duration (minutes)</label>
            <input type="number" name="duration" min="1" value="{{ old('duration', $quiz->duration) }}"
                class="block w-full px-4 py-3 text-base rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500"
                required>
        </div>

        {{-- Course --}}
        <div>
            <label class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Linked Course</label>
            <select name="course_id"
                class="block w-full px-4 py-3 text-base rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500"
                required>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id === $quiz->course_id ? 'selected' : '' }}>
                        {{ $course->title }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Questions --}}
        @php
            $questionJson = htmlspecialchars(json_encode(
                $quiz->questions->map(fn($q) => [
                    'question' => $q->question,
                    'option_a' => $q->option_a,
                    'option_b' => $q->option_b,
                    'option_c' => $q->option_c,
                    'option_d' => $q->option_d,
                    'correct_option' => $q->correct_option,
                ])->values()
            ), ENT_QUOTES, 'UTF-8');
        @endphp

        <div x-data='{"questions": {!! $questionJson !!} }' class="space-y-10 mt-10">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Questions</h2>

            <template x-for="(question, index) in questions" :key="index">
                <div class="p-8 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg space-y-6">

                    {{-- Question Text --}}
                    <div>
                        <label class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Question <span x-text="index + 1"></span>
                        </label>
                        <input type="text"
                            :name="`questions[${index}][question]`"
                            x-model="question.question"
                            class="block w-full px-4 py-3 text-base rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter the question text..." required>
                    </div>

                    {{-- Options A-D --}}
                    <div class="grid grid-cols-2 gap-6">
                        <template x-for="opt in ['a', 'b', 'c', 'd']" :key="opt">
                            <div>
                                <label class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2"
                                    x-text="'Option ' + opt.toUpperCase()"></label>
                                <input type="text"
                                    :name="`questions[${index}][option_${opt}]`"
                                    x-model="question[`option_${opt}`]"
                                    class="block w-full px-4 py-3 text-base rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    :placeholder="`Enter option ${opt.toUpperCase()}`" required>
                            </div>
                        </template>
                    </div>

                    {{-- Correct Option --}}
                    <div>
                        <label class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Correct Answer</label>
                        <select
                            :name="`questions[${index}][correct_option]`"
                            x-model="question.correct_option"
                            class="block w-full px-4 py-3 text-base rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="">Select correct option</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                            <option value="d">D</option>
                        </select>
                    </div>

                    {{-- Remove Question --}}
                    <div class="text-right">
                        <button type="button" @click="questions.splice(index, 1)"
                            class="text-red-600 text-sm hover:underline">
                            Remove this question
                        </button>
                    </div>
                </div>
            </template>

            {{-- Add Question --}}
            <div>
                <button type="button"
                    @click="questions.push({question: '', option_a: '', option_b: '', option_c: '', option_d: '', correct_option: ''})"
                    class="inline-flex items-center bg-blue-600 text-white px-5 py-3 rounded hover:bg-blue-700 transition text-base font-medium">
                    + Add Question
                </button>
            </div>
        </div>

        {{-- Footer: Back + Submit --}}
        <div class="mt-12 flex justify-between items-center">
            <a href="{{ route('teacher.quiz') }}"
               class="inline-flex items-center px-5 py-3 border border-gray-300 dark:border-gray-600 rounded-md text-base font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 shadow">
                <x-heroicon-o-arrow-left class="h-5 w-5 mr-2" />
                Back to Quiz List
            </a>

            <button type="submit"
                class="bg-blue-600 text-white px-6 py-3 text-base font-medium rounded-md hover:bg-blue-700">
                Update Quiz
            </button>
        </div>
    </form>
</div>
@endsection
