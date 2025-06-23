@extends('layouts.teacher')

@section('title', 'Teacher Dashboard')
@section('header', 'Dashboard')

@section('content')

<div class="mb-8">
    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-2">
    {{-- Welcome back, {{ Auth::user()->name }}! --}}
    Welcome back, Teacher!
    </h1>
    <p class="text-gray-600 dark:text-gray-400 text-sm">
        Hope you're having a productive day.
    </p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <a href="{{ route('teacher.courses') }}" class="p-4 bg-white dark:bg-gray-800 rounded shadow text-center hover:bg-gray-100 dark:hover:bg-gray-700 transition">
        <p class="text-gray-600 dark:text-gray-300 text-sm">Total Courses</p>
        <p class="text-2xl font-semibold text-blue-600 dark:text-blue-400">{{ $totalCourses }}</p>
    </a>
    <a href="{{ route('teacher.quiz') }}" class="p-4 bg-white dark:bg-gray-800 rounded shadow text-center hover:bg-gray-100 dark:hover:bg-gray-700 transition">
        <p class="text-gray-600 dark:text-gray-300 text-sm">Total Quizzes</p>
        <p class="text-2xl font-semibold text-yellow-600 dark:text-yellow-400">{{ $totalQuiz }}</p>
    </a>
    <a href="{{ route('teacher.students') }}" class="p-4 bg-white dark:bg-gray-800 rounded shadow text-center hover:bg-gray-100 dark:hover:bg-gray-700 transition">
        <p class="text-gray-600 dark:text-gray-300 text-sm">Total Students</p>
        <p class="text-2xl font-semibold text-green-600 dark:text-green-400">{{ $totalStudent }}</p>
    </a>
</div>

<div>
    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Recent Activity</h2>
    <ul class="bg-white dark:bg-gray-800 rounded shadow p-4 space-y-2 text-sm text-gray-700 dark:text-gray-300">
        <li>📥 3 students completed quiz in <strong class="text-gray-800 dark:text-gray-100">Web Development</strong></li>
        <li>👤 New student enrolled in <strong class="text-gray-800 dark:text-gray-100">UI/UX Fundamentals</strong></li>
    </ul>
</div>

@endsection
