<x-layouts.app title="Quiz">
    <x-slot name="header">
        <nav class="text-lg text-gray-800 dark:text-gray-100 font-semibold">
            <a href="{{ route('teacher.quiz') }}" class="hover:underline text-blue-600 dark:text-blue-400">My Courses</a>
            <span class="mx-2">/</span>
            <span>{{ $quiz->title }}</span>
        </nav>
    </x-slot>
    <div class="w-full max-w-7xl mx-auto bg-white dark:bg-gray-800 px-10 py-10 rounded-lg shadow">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">{{ $quiz->title }}</h1>
    @if($quiz->description)
        <p class="text-gray-600 dark:text-gray-300 mb-4">{{ $quiz->description }}</p>
    @endif
    <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
        Linked Course: <strong>{{ $quiz->course->title }}</strong>
        &nbsp;&nbsp;•&nbsp;&nbsp;🕒 Duration: {{ $quiz->duration }} minutes
        &nbsp;&nbsp;•&nbsp;&nbsp;📄 {{ $quiz->questions->count() }} questions
    </p>

    <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-white">Questions</h2>

    <div class="space-y-6">
        @foreach ($quiz->questions as $index => $question)
            <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-lg">
                <p class="font-medium text-gray-800 dark:text-white">
                    {{ $index + 1 }}. {{ $question->question }}
                </p>
                <ul class="mt-3 space-y-1 list-none pl-6">
                    <li @if($question->correct_option == 'a') class="text-green-600 font-semibold" @endif>
                        A. {{ $question->option_a }}
                    </li>
                    <li @if($question->correct_option == 'b') class="text-green-600 font-semibold" @endif>
                        B. {{ $question->option_b }}
                    </li>
                    <li @if($question->correct_option == 'c') class="text-green-600 font-semibold" @endif>
                        C. {{ $question->option_c }}
                    </li>
                    <li @if($question->correct_option == 'd') class="text-green-600 font-semibold" @endif>
                        D. {{ $question->option_d }}
                    </li>
                </ul>
            </div>
        @endforeach
    </div>

    <!-- Back Button -->
    <div class="mt-10 flex justify-between items-center">
        <a href="{{ route('teacher.quiz') }}"
           class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700">
            <x-heroicon-o-arrow-left class="h-4 w-4 mr-2" />
            Back to Quiz List
        </a>
    </div>
</div>
</x-layouts.app>