@extends('layouts.teacher')

@section('title', 'Add New Course')
@section('header', 'Add New Course')

@section('content')
<div class="w-full max-w-5xl mx-auto bg-white dark:bg-gray-800 px-10 py-10 rounded-lg shadow">
    <h1 class="text-3xl font-semibold mb-8 text-gray-800 dark:text-white">Create New Course</h1>

    <form action="{{ route('teacher.courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Course Info -->
        <div class="space-y-6">
            @foreach ([
                ['name' => 'title', 'label' => 'Course Title'],
                ['name' => 'duration', 'label' => 'Duration (e.g. 12 weeks)'],
                ['name' => 'price', 'label' => 'Price in USD', 'type' => 'number'],
                ['name' => 'video_url', 'label' => 'Course Preview Video URL', 'type' => 'url'],
                ['name' => 'topics', 'label' => 'Topics (e.g. HTML, CSS)', 'type' => 'text']
            ] as $field)
                <div class="space-y-1">
                    <label for="{{ $field['name'] }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        {{ $field['label'] }}
                    </label>
                    <input type="{{ $field['type'] ?? 'text' }}"
                        name="{{ $field['name'] }}"
                        id="{{ $field['name'] }}"
                        class="w-full border border-gray-300 dark:border-gray-600 rounded px-4 py-3 text-sm dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
            @endforeach

            <div class="space-y-1">
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Course Description
                </label>
                <textarea name="description" id="description" rows="4"
                          class="w-full border border-gray-300 dark:border-gray-600 rounded px-4 py-3 text-sm dark:bg-gray-700 dark:text-white focus:outline-none focus:ring focus:ring-blue-500"
                          required></textarea>
            </div>

            <div class="space-y-1">
                <label for="level" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Course Level
                </label>
                <select name="level" id="level"
                        class="w-full border border-gray-300 dark:border-gray-600 rounded px-4 py-3 text-sm dark:bg-gray-700 dark:text-white focus:ring focus:ring-blue-500"
                        required>
                    <option value="" disabled selected hidden>Select Level</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                </select>
            </div>
        </div>

        <!-- Lessons -->
        <div x-data="{ lessons: [{}] }" class="mt-10 space-y-4">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Lessons</h2>

            <template x-for="(lesson, index) in lessons" :key="index">
                <div class="border p-5 rounded-lg space-y-4 bg-gray-50 dark:bg-gray-700">
                    <h3 class="text-md font-semibold text-gray-800 dark:text-white mb-2" x-text="'Lesson ' + (index + 1)"></h3>
                    <template x-for="field in [
                        { name: 'title', label: 'Lesson Title', type: 'text' },
                        { name: 'duration', label: 'Duration (e.g. 15:30)', type: 'text' },
                        { name: 'video_url', label: 'Lesson Video or Link URL', type: 'url' }
                    ]">
                        <div class="space-y-1">
                            <label :for="`lessons[${index}][${field.name}]`"
                                   class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                   x-text="field.label"></label>
                            <input
                                :type="field.type"
                                :name="`lessons[${index}][${field.name}]`"
                                class="w-full border border-gray-300 dark:border-gray-600 rounded px-4 py-3 text-sm dark:bg-gray-600 dark:text-white focus:ring focus:ring-blue-500"
                                required>
                        </div>
                    </template>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lesson Type</label>
                        <select :name="`lessons[${index}][type]`"
                                class="w-full border border-gray-300 dark:border-gray-600 rounded px-4 py-3 text-sm dark:bg-gray-600 dark:text-white">
                            <option value="video">Video</option>
                            <option value="link">Link</option>
                            <option value="reading">Reading</option>
                        </select>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lesson Modul (PDF)</label>
                            <input type="file" :name="`lessons[${index}][modul]`"
                                accept="application/pdf"
                                class="block w-full text-sm text-gray-900 dark:text-gray-100 
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-md file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-blue-50 file:text-blue-700
                                        hover:file:bg-blue-100
                                        dark:file:bg-blue-800 dark:file:text-white dark:hover:file:bg-blue-700">
                    </div>

                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" :name="`lessons[${index}][is_free]`"
                               class="rounded border-gray-300 text-blue-600">
                        <span class="text-sm text-gray-700 dark:text-gray-300">Is this lesson free?</span>
                    </label>

                    <br>

                    <button type="button" @click="lessons.splice(index, 1)"
                            class="text-red-600 text-sm hover:underline">
                        Remove Lesson
                    </button>
                </div>
            </template>

            <button type="button" @click="lessons.push({})"
                    class="mt-2 inline-block text-sm text-blue-600 hover:underline">
                + Add Lesson
            </button>
        </div>

        <!-- Submit -->
        <div class="mt-10">
            <button type="submit"
                    class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700">
                Save Course
            </button>
        </div>
    </form>
</div>
@endsection
