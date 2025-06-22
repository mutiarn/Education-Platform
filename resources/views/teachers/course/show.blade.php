@extends('layouts.teacher')

@section('title', 'My Courses')
@section('header')
    <a href="{{ route('teacher.courses') }}" class="text-white hover:text-white">My Courses</a> &gt; 
    <span class="text-white font-semibold">{{ $course->title }}</span>
@endsection


@section('content')
<div class="space-y-6">
    <!-- Course Header -->
    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="relative">
            <!-- Banner -->
            <div class="h-64 bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
                <div class="text-center">
                    <button onclick="window.open('{{ $course->video_url }}', '_blank')"
                            class="bg-white bg-opacity-20 hover:bg-opacity-30 rounded-full p-6 transition mb-4">
                        <x-heroicon-s-play class="h-16 w-16 text-white" />
                    </button>
                    <p class="text-white text-lg font-medium">Watch Course Preview</p>
                </div>
            </div>

            <!-- Info -->
            <div class="px-6 py-8">
                <div class="flex items-center gap-4 mb-4">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $course->level === 'Advanced' ? 'bg-red-100 text-red-800' : ($course->level === 'Intermediate' ? 'bg-orange-100 text-orange-800' : 'bg-green-100 text-green-800') }}">
                        {{ $course->level }}
                    </span>
                    <div class="flex items-center">
                        <x-heroicon-s-star class="h-5 w-5 text-yellow-400" />
                        <span class="text-sm font-medium ml-1">{{ $course->rating }}</span>
                        <span class="text-sm text-gray-500 ml-2">({{ number_format($course->students) }} students)</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-500">
                        <x-heroicon-o-clock class="h-4 w-4 mr-1" />
                        {{ $course->duration }}
                    </div>
                </div>

                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $course->title }}</h1>
                <p class="text-lg text-gray-600 mb-6">{{ $course->description }}</p>

                <!-- Instructor -->
                <div class="flex items-center mb-6">
                    <img class="h-12 w-12 rounded-full"
                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                         alt="Instructor">
                    <div class="ml-4">
                        <p class="text-lg font-medium text-gray-900">{{ $course->instructor }}</p>
                        <p class="text-sm text-gray-500">Expert Instructor</p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex gap-4">
                    <button class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                        Enroll Now - ${{ number_format($course->price, 2) }}
                    </button>
                    <a href="{{ $course->video_url }}" target="_blank"
                       class="border border-gray-300 text-gray-700 px-8 py-3 rounded-lg font-semibold hover:bg-gray-50 transition flex items-center">
                        <x-heroicon-o-play class="h-5 w-5 mr-2" />
                        Preview Course
                    </a>
                    <button class="border border-gray-300 text-gray-700 px-8 py-3 rounded-lg font-semibold hover:bg-gray-50 transition">
                        Add to Wishlist
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Learning Outcomes -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-6 py-5">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">What you'll learn</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        @foreach($course->topics as $topic)
                            <div class="flex items-center">
                                <x-heroicon-o-check-circle class="h-5 w-5 text-green-500 mr-3" />
                                <span class="text-gray-700">{{ $topic }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Lessons -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-6 py-5">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Course Content</h2>
                    <div class="space-y-3">
                        @foreach($course->lessons as $lesson)
                            <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition">
                                <a href="{{ route('courses.lessons.show', [$course->id, $lesson->id]) }}"
                                   class="flex items-center justify-between group">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center group-hover:bg-blue-200 transition">
                                            <x-heroicon-o-play class="h-5 w-5 text-blue-600" />
                                        </div>
                                        <div class="min-w-0">
                                            <p class="text-base font-medium text-gray-900 group-hover:text-blue-700 transition">
                                                {{ $lesson->order }}. {{ $lesson->title }}
                                            </p>
                                            <p class="text-sm text-gray-500 mt-1">{{ $lesson->duration }}</p>
                                        </div>
                                    </div>
                                    @if($lesson->is_free)
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Free
                                        </span>
                                    @else
                                        <x-heroicon-o-lock-closed class="h-5 w-5 text-gray-400" />
                                    @endif
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-6 py-5">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Course Description</h2>
                    <div class="prose max-w-none text-gray-700">
                        <p>{{ $course->description }}</p>
                        <p class="mt-4">This comprehensive course is designed to take you from beginner to advanced level. You'll work on real-world projects and gain hands-on experience with industry-standard tools and practices.</p>
                        <p class="mt-4">By the end of this course, you'll have the skills and confidence to tackle complex projects and advance your career in this field.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <div class="bg-white overflow-hidden shadow rounded-lg sticky top-6">
                <div class="px-6 py-5 space-y-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Course Details</h3>
                    <div class="space-y-2 text-sm text-gray-700">
                        <div class="flex justify-between"><span>Duration:</span><span>{{ $course->duration }}</span></div>
                        <div class="flex justify-between"><span>Level:</span><span>{{ $course->level }}</span></div>
                        <div class="flex justify-between"><span>Students:</span><span>{{ number_format($course->students) }}</span></div>
                        <div class="flex justify-between"><span>Rating:</span><span>{{ $course->rating }}</span></div>
                        <div class="flex justify-between"><span>Lessons:</span><span>{{ $course->lessons->count() }}</span></div>
                        <div class="flex justify-between"><span>Price:</span><span>${{ number_format($course->price, 2) }}</span></div>
                    </div>
                    <div class="pt-4 space-y-3">
                        <button class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg font-semibold hover:bg-blue-700 transition">
                            Enroll Now
                        </button>
                        <button class="w-full border border-gray-300 text-gray-700 py-3 px-4 rounded-lg font-semibold hover:bg-gray-50 transition">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back -->
    <div class="flex justify-start">
        <a href="{{ route('teacher.courses') }}"
           class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
            <x-heroicon-o-arrow-left class="h-4 w-4 mr-2" />
            Back to Courses
        </a>
    </div>
</div>
@endsection
