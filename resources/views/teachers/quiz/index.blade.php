@extends('layouts.teacher')

@section('title', 'Quiz')
@section('header', 'Quiz')

@section('content')
    <div class="p-6">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-1">
                Siap Menguji Pengetahuan? 🎯
            </h1>
            <p class="text-gray-600 dark:text-gray-300">
                Kelola quiz untuk setiap course-mu dan lihat seberapa jauh pemahaman siswa.
            </p>
        </div>

        <div class="flex items-center justify-between mb-4">
            <a href="#"
               class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700 transition">
                + Add New Quiz
            </a>
        </div>

        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Quiz List</h2>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {{-- Example Quiz Card --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                        Quiz Title Here
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                        Total Questions: 10
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        Duration: 30 minutes
                    </p>
                </div>
                <div class="flex items-center justify-between px-4 py-2 bg-gray-100 dark:bg-gray-700 text-sm">
                    <span class="text-gray-600 dark:text-gray-300">
                        Linked to: Course Title
                    </span>
                    <a href="#" class="text-blue-600 hover:underline dark:text-blue-400">
                        Manage
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
