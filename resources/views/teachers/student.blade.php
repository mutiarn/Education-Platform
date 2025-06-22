@extends('layouts.teacher')

@section('title', 'Students')
@section('header', 'Students')

@section('content')
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
                <th class="px-6 py-3 text-left font-semibold">Action</th>
            </tr>
        </thead>
    <tbody>
    {{-- Example row --}}
    <tr class="border-b dark:border-gray-700">
        <td class="px-6 py-4">1</td>
        <td class="px-6 py-4">John Doe</td>
        <td class="px-6 py-4">john@example.com</td>
        <td class="px-6 py-4">Web Development</td>
        <td class="px-6 py-4">
            <a href="#"
                class="text-blue-600 hover:underline dark:text-blue-400">View</a>
        </td>
    </tr>
    </tbody>
    </table>
</div>
@endsection
