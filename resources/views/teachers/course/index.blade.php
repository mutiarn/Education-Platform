@extends('layouts.teacher')

@section('title', 'My Courses')
@section('header', 'My Courses')

@section('content')
<div class="mb-8">
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

            {{-- Tambahkan kartu lainnya di sini --}}
        </div>
@endsection
