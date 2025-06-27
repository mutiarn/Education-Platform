<x-layouts.app title="Student">
    <div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-1">
        Daftar Siswa 🧑‍🎓
    </h1>
    <p class="text-gray-600 dark:text-gray-300">
        Lihat dan kelola siswa yang tergabung dalam kursusmu. Kamu bisa melihat performa mereka juga!
    </p>
</div>

<div class="overflow-x-auto bg-white dark:bg-gray-800 rounded shadow">
    <table class="min-w-full text-sm">
        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
            <tr>
                <th class="px-6 py-3 text-left font-semibold">#</th>
                <th class="px-6 py-3 text-left font-semibold">Name</th>
                <th class="px-6 py-3 text-left font-semibold">Email</th>
                <th class="px-6 py-3 text-left font-semibold">Course</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $index => $student)
                <tr class="border-b dark:border-gray-700">
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">{{ $student->name }}</td>
                    <td class="px-6 py-4">{{ $student->email }}</td>
                    <td class="px-6 py-4">{{ $student->course->title ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center px-6 py-6 text-gray-500 dark:text-gray-400">
                        Belum ada siswa yang terdaftar.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-layouts.app>