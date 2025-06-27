<x-layouts.app title="My Course">
<div x-data="courseModal()" x-init="initCourses({!! json_encode($courses) !!})">
    <div class="mb-8">
        <p class="text-gray-600 dark:text-gray-300">
            Berikut adalah daftar kursus yang kamu kelola. Tetap semangat membagikan ilmu! 💡
        </p>
    </div>

    <div class="flex items-center justify-between mb-6">
        <a href="{{ route('teacher.courses.create') }}"
           class="px-4 py-2 text-sm font-medium text-white bg-primary rounded hover:bg-primary/80 transition">
            + Add New Course
        </a>
    </div>

    @if ($courses->count())
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 space-y-6 col-span-full">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($courses as $course)
            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-200">
                {{-- Thumbnail & info --}}
                <div class="cursor-pointer" @click="openModal(@js([
                    'id' => $course->id,
                    'title' => $course->title,
                    'description' => $course->description,
                    'instructor' => Auth::user()->name,
                    'level' => $course->level,
                    'students' => $course->students,
                    'duration' => $course->duration,
                    'videoUrl' => $course->video_url,
                    'topics' => $course->topics,
                    'lessons' => $course->lessons,
                ]))">
                    <div class="aspect-video bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
                        <x-heroicon-o-play-circle class="h-16 w-16 text-white opacity-80" />
                    </div>
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                {{ $course->level === 'Advanced' ? 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' : 
                                ($course->level === 'Intermediate' ? 'bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200' : 
                                'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200') }}">
                                {{ $course->level }}
                            </span>
                        </div>
                        <h3 class="font-semibold text-gray-900 dark:text-white mb-2">{{ $course->title }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-3 line-clamp-2">
                            {{ Str::limit($course->description, 100) }}
                        </p>
                        <div class="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400">
                            <span>{{ Auth::user()->name }}</span>
                            <span>{{ number_format($course->students) }} students</span>
                        </div>
                    </div>
                </div>

                {{-- Action buttons --}}
                <div class="px-4 pb-4 flex justify-between items-center text-sm">
                    <a href="{{ route('teacher.courses.edit', $course->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                    <a href="javascript:void(0)" @click.stop="openModal(@js([
                        'id' => $course->id,
                        'title' => $course->title,
                        'description' => $course->description,
                        'instructor' => Auth::user()->name,
                        'level' => $course->level,
                        'students' => $course->students,
                        'duration' => $course->duration,
                        'videoUrl' => $course->video_url,
                        'topics' => $course->topics,
                        'lessons' => $course->lessons,
                    ]))" class="text-blue-500 hover:underline">View</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @else
        <p class="text-gray-500 dark:text-gray-400 col-span-full text-center">Belum ada kursus tersedia.</p>
    @endif

    @include('teachers.course.modal')
</div>

<script>
    function courseModal() {
        return {
            showModal: false,
            selectedCourse: null,
            courses: [],
            initCourses(data) {
                this.courses = data;
            },
            openModal(course) {
                this.selectedCourse = course;
                this.showModal = true;
            },
            closeModal() {
                this.showModal = false;
                this.selectedCourse = null;
            }
        }
    }
</script>
</x-layouts.app>
