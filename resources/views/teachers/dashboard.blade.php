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
        <p class="text-2xl font-semibold text-blue-600 dark:text-blue-400">5</p>
    </a>
    <a href="{{ route('teacher.students') }}" class="p-4 bg-white dark:bg-gray-800 rounded shadow text-center hover:bg-gray-100 dark:hover:bg-gray-700 transition">
        <p class="text-gray-600 dark:text-gray-300 text-sm">Total Students</p>
        <p class="text-2xl font-semibold text-green-600 dark:text-green-400">128</p>
    </a>
    <a href="{{ route('teacher.quiz') }}" class="p-4 bg-white dark:bg-gray-800 rounded shadow text-center hover:bg-gray-100 dark:hover:bg-gray-700 transition">
        <p class="text-gray-600 dark:text-gray-300 text-sm">Total Quizzes</p>
        <p class="text-2xl font-semibold text-yellow-600 dark:text-yellow-400">15</p>
    </a>
</div>

<div class="mb-6">
    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">My Courses</h2>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Course Card 1 -->
        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-200 cursor-pointer">
            <div class="aspect-video bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
                <x-heroicon-o-play-circle class="h-16 w-16 text-white opacity-80" />
            </div>
            <div class="p-4">
                <div class="flex items-center justify-between mb-2">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        Beginner
                    </span>
                    <div class="flex items-center">
                        <x-heroicon-s-star class="h-4 w-4 text-yellow-400" />
                        <span class="text-sm text-gray-600 ml-1">4.5</span>
                    </div>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Basic Web Development</h3>
                <p class="text-sm text-gray-600 mb-3 line-clamp-2">
                    Belajar HTML, CSS, dan dasar JavaScript untuk membangun website statis.
                </p>
                <div class="flex items-center justify-between text-sm text-gray-500">
                    <span>John Doe</span>
                    <span>24 students</span>
                </div>
            </div>
    </div>

    </div>
</div>


<div>
    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Recent Activity</h2>
    <ul class="bg-white dark:bg-gray-800 rounded shadow p-4 space-y-2 text-sm text-gray-700 dark:text-gray-300">
        <li>📥 3 students submitted assignments in <strong class="text-gray-800 dark:text-gray-100">Web Development</strong></li>
        <li>👤 New student enrolled in <strong class="text-gray-800 dark:text-gray-100">UI/UX Fundamentals</strong></li>
        <li>📅 Class rescheduled for <strong class="text-gray-800 dark:text-gray-100">JavaScript Basics</strong></li>
    </ul>
</div>

@endsection
