<x-layouts.app title="Add Quiz">
    <div class="w-full max-w-5xl mx-auto bg-white dark:bg-gray-800 px-10 py-10 rounded-lg shadow">
    <h1 class="text-3xl font-semibold mb-8 text-gray-800 dark:text-white">
        Create Quiz for <span class="text-blue-600">{{ $course->title }}</span>
    </h1>

    <form method="POST" action="{{ route('teacher.quiz.store', $course) }}">
        @csrf

        <!-- Duration Input -->
        <div class="mb-8">
            <label for="duration" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                Duration (in minutes)
            </label>
            <input type="number" name="duration" id="duration" min="1"
                   class="w-full border border-gray-300 dark:border-gray-600 rounded px-4 py-3 text-sm dark:bg-gray-800 dark:text-white focus:ring focus:ring-blue-500"
                   placeholder="e.g., 30" required>
        </div>

        <!-- Dynamic Questions -->
        <div x-data="{ questions: [{}] }" class="space-y-6">
            <template x-for="(question, index) in questions" :key="index">
                <div class="p-6 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg space-y-6">
                    <div>
                        <label :for="`questions[${index}][question]`" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Question <span x-text="index + 1"></span>
                        </label>
                        <input type="text" 
                               :name="`questions[${index}][question]`"
                               class="mt-1 block w-full px-4 py-2 border rounded-md dark:bg-gray-800 dark:text-white focus:ring focus:ring-blue-500"
                               placeholder="Enter the question text..." required>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <template x-for="opt in ['a', 'b', 'c', 'd']">
                            <div>
                                <label :for="`questions[${index}][option_${opt}]`" 
                                       class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                       x-text="'Option ' + opt.toUpperCase()"></label>
                                <input type="text"
                                       :name="`questions[${index}][option_${opt}]`"
                                       class="mt-1 block w-full px-4 py-2 border rounded-md dark:bg-gray-800 dark:text-white focus:ring focus:ring-blue-500"
                                       :placeholder="`Enter option ${opt.toUpperCase()}`" required>
                            </div>
                        </template>
                    </div>

                    <div>
                        <label :for="`questions[${index}][correct_option]`" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Correct Answer
                        </label>
                        <select :name="`questions[${index}][correct_option]`"
                                class="mt-1 block w-full px-4 py-2 border rounded-md dark:bg-gray-800 dark:text-white focus:ring focus:ring-blue-500"
                                required>
                            <option value="">Select correct option</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                            <option value="d">D</option>
                        </select>
                    </div>

                    <div class="text-right">
                        <button type="button" @click="questions.splice(index, 1)" 
                                class="text-red-600 text-sm hover:underline">
                            Remove this question
                        </button>
                    </div>
                </div>
            </template>

            <div>
                <button type="button" @click="questions.push({})"
                        class="inline-flex items-center bg-primary text-white px-4 py-2 rounded hover:bg-primary/80 transition">
                    + Add Question
                </button>
            </div>
        </div>

        <!-- Submit -->
        <div class="mt-10 flex justify-between items-center">
            <a href="{{ route('teacher.quiz') }}"
               class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700">
                <x-heroicon-o-arrow-left class="h-4 w-4 mr-2" />
                Back to Quiz List
            </a>

            <button type="submit"
                    class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition">
                Save Quiz
            </button>
        </div>
    </form>
</div>
</x-layouts.app>