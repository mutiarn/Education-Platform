<x-layouts.app title="Edit Course">
<div class="w-full max-w-5xl mx-auto bg-white dark:bg-gray-800 px-10 py-10 rounded-lg shadow">
    <h1 class="text-3xl font-semibold mb-8 text-gray-800 dark:text-white">Edit Course</h1>

    <!-- Form Update Course -->
    <form id="edit-course-form" action="{{ route('teacher.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @php
            $topics = is_array($course->topics)
                ? $course->topics
                : (is_string($course->topics)
                    ? explode(',', $course->topics)
                    : []);
        @endphp

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
                        value="{{ old($field['name'], $field['name'] === 'topics' ? implode(',', $topics) : $course[$field['name']]) }}"
                        class="w-full border border-gray-300 dark:border-gray-600 rounded px-4 py-3 text-sm dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
            @endforeach

            <div class="space-y-1">
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Course Description</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full border border-gray-300 dark:border-gray-600 rounded px-4 py-3 text-sm dark:bg-gray-700 dark:text-white focus:outline-none focus:ring focus:ring-blue-500"
                    required>{{ old('description', $course->description) }}</textarea>
            </div>

            <div class="space-y-1">
                <label for="level" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Course Level</label>
                <select name="level" id="level"
                    class="w-full border border-gray-300 dark:border-gray-600 rounded px-4 py-3 text-sm dark:bg-gray-700 dark:text-white focus:ring focus:ring-blue-500"
                    required>
                    <option value="" disabled hidden>Select Level</option>
                    <option value="Beginner" {{ $course->level == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                    <option value="Intermediate" {{ $course->level == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                    <option value="Advanced" {{ $course->level == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                </select>
            </div>
        </div>

        <!-- Lessons -->
        <div x-data="{ lessons: @js(old('lessons', $course->lessons)) }" class="mt-10 space-y-4">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Lessons</h2>

            <template x-for="(lesson, index) in lessons" :key="index">
                <div class="border p-5 rounded-lg space-y-4 bg-gray-50 dark:bg-gray-700">
                    <h3 class="text-md font-semibold text-gray-800 dark:text-white mb-2" x-text="'Lesson ' + (index + 1)"></h3>

                    <!-- Input Fields -->
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
                                x-model="lesson[field.name]"
                                class="w-full border border-gray-300 dark:border-gray-600 rounded px-4 py-3 text-sm dark:bg-gray-600 dark:text-white focus:ring focus:ring-blue-500"
                                required>
                        </div>
                    </template>

                    <!-- Type -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lesson Type</label>
                        <select :name="`lessons[${index}][type]`"
                            x-model="lesson.type"
                            class="w-full border border-gray-300 dark:border-gray-600 rounded px-4 py-3 text-sm dark:bg-gray-600 dark:text-white">
                            <option value="video">Video</option>
                            <option value="link">Link</option>
                            <option value="reading">Reading</option>
                        </select>
                    </div>

                    <!-- Modul -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lesson Modul (PDF)</label>
                        <input type="file" :name="`lessons[${index}][modul]`" accept="application/pdf"
                            class="block w-full text-sm text-gray-900 dark:text-gray-100 
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-md file:border-0
                                file:text-sm file:font-semibold
                                file:bg-blue-50 file:text-blue-700
                                hover:file:bg-blue-100
                                dark:file:bg-blue-800 dark:file:text-white dark:hover:file:bg-blue-700">
                    </div>

                    <!-- Free -->
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox"
                            :name="`lessons[${index}][is_free]`"
                            x-model="lesson.is_free"
                            class="rounded border-gray-300 text-blue-600">
                        <span class="text-sm text-gray-700 dark:text-gray-300">Is this lesson free?</span>
                    </label>

                    <!-- Remove Button -->
                    <button type="button" @click="lessons.splice(index, 1)"
                            class="text-red-600 text-sm hover:underline">
                        Remove Lesson
                    </button>
                </div>
            </template>

            <button type="button" @click="lessons.push({
                title: '', duration: '', video_url: '', type: 'video', is_free: false
            })"
                class="mt-2 inline-block text-sm text-blue-600 hover:underline">
                + Add Lesson
            </button>
        </div>
    </form>

    <!-- Buttons outside form -->
    <div class="mt-10 flex justify-between items-center">
        <a href="{{ route('teacher.courses') }}"
            class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700">
            <x-heroicon-o-arrow-left class="h-4 w-4 mr-2" />
            Back to Courses
        </a>

        <div class="flex gap-4 items-center">
            <!-- Delete Form -->
            <form action="{{ route('teacher.courses.destroy', $course->id) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this course? This action cannot be undone.');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition">
                    Delete Course
                </button>
            </form>

            <!-- Submit Update Button -->
            <button type="submit"
                    form="edit-course-form"
                    class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition">
                Update Course
            </button>
        </div>
    </div>
</div>
</x-layouts.app>