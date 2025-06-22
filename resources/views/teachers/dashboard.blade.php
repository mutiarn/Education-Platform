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


    <div class="p-4 bg-white dark:bg-gray-800 rounded shadow text-center">
        <p class="text-gray-600 dark:text-gray-300 text-sm">Total Courses</p>
        <p class="text-2xl font-semibold text-blue-600 dark:text-blue-400">5</p>
    </div>
    <div class="p-4 bg-white dark:bg-gray-800 rounded shadow text-center">
        <p class="text-gray-600 dark:text-gray-300 text-sm">Total Students</p>
        <p class="text-2xl font-semibold text-green-600 dark:text-green-400">128</p>
    </div>
    <div class="p-4 bg-white dark:bg-gray-800 rounded shadow text-center">
        <p class="text-gray-600 dark:text-gray-300 text-sm">Quizzes Completed</p>
        <p class="text-2xl font-semibold text-purple-600 dark:text-purple-400">312</p>
    </div>
</div>

<div class="mb-6">
    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">My Courses</h2>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Course Card 1 -->
        <div class="bg-white dark:bg-gray-800 rounded shadow p-4 flex flex-col justify-between">
            <div>
                <h3 class="font-medium text-gray-800 dark:text-gray-100 mb-1">Basic Web Development</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">12 Students</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">Last updated: 10 Jun 2025</p>
            </div>
            <div class="mt-4 text-right">
                <a href="#" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">View</a>
            </div>
        </div>

        <!-- Course Card 2 -->
        <div class="bg-white dark:bg-gray-800 rounded shadow p-4 flex flex-col justify-between">
            <div>
                <h3 class="font-medium text-gray-800 dark:text-gray-100 mb-1">UI/UX Fundamentals</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">25 Students</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">Last updated: 8 Jun 2025</p>
            </div>
            <div class="mt-4 text-right">
                <a href="#" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">View</a>
            </div>
        </div>

        <!-- Course Card 3 (contoh tambahan) -->
        <div class="bg-white dark:bg-gray-800 rounded shadow p-4 flex flex-col justify-between">
            <div>
                <h3 class="font-medium text-gray-800 dark:text-gray-100 mb-1">JavaScript Basics</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">18 Students</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">Last updated: 5 Jun 2025</p>
            </div>
            <div class="mt-4 text-right">
                <a href="#" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">View</a>
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
