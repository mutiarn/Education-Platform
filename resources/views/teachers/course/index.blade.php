@extends('layouts.teacher')

@section('title', 'My Courses')
@section('header', 'My Courses')

@section('content')
<div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-1">
                Welcome Back! 👋
            </h1>
            <p class="text-gray-600 dark:text-gray-300">
                Berikut adalah daftar kursus yang kamu kelola. Tetap semangat membagikan ilmu! 💡
            </p>
        </div>

        <div class="flex items-center justify-between mb-6">
            <a href="#"
               class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700 transition">
                + Add New Course
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {{-- Course Card (example only) --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
                <div class="p-4">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                        Course Title Here
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                        Short course description goes here. This is placeholder text.
                    </p>
                </div>
                <div class="flex items-center justify-between px-4 py-2 bg-gray-100 dark:bg-gray-700 text-sm">
                    <span class="text-gray-600 dark:text-gray-300">
                        0 students
                    </span>
                    <a href="#"
                       class="text-blue-600 hover:underline dark:text-blue-400">
                        View
                    </a>
                </div>
            </div>

            {{-- Tambahkan kartu lainnya di sini --}}
        </div>
@endsection
