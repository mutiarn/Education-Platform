@extends('layouts.teacher')

@section('title', 'Inbox')
@section('header', 'Inbox')

@section('content')
    <div class="p-6">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-1">
                Kotak Masuk 📥
            </h1>
            <p class="text-gray-600 dark:text-gray-300">
                Semua pesan dan notifikasi yang kamu terima akan tampil di sini. Tetap terhubung dengan muridmu!
            </p>
        </div>

        <div class="overflow-hidden bg-white dark:bg-gray-800 rounded shadow">
            <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                {{-- Example inbox item --}}
                <li class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-md font-semibold text-gray-800 dark:text-white">
                                Pesan dari John Doe
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Halo Kak, saya ada pertanyaan tentang tugas...
                            </p>
                        </div>
                        <span class="text-xs text-gray-500 dark:text-gray-400">2 jam lalu</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
