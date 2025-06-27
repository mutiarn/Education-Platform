@props(['title'])

<!DOCTYPE html>
<html lang="id"
      x-data="{ dark: localStorage.getItem('theme') === 'dark' }"
      :class="{ 'dark': dark }"
      class="h-full bg-gray-100 dark:bg-gray-900 dark:text-white transition-all">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Transition untuk smooth switching -->
    <style>
        html, body, [class*="bg-"], [class*="text-"], [class*="border-"] {
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        }
    </style>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="h-full dark:bg-gray-900 dark:text-white">
    <div class="min-h-full">
        <x-layouts.sidebar :collapsed="false" />

        <x-layouts.header>
            @isset($header)
                {{ $header }}
            @else
                {{ $title }}
            @endisset
        </x-layouts.header>


        <main class="transition-all duration-300 lg:pl-20 bg-gray-100 dark:bg-gray-900 min-h-screen text-gray-800 dark:text-white">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>

    </div>
</body>
</html>
