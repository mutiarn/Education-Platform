<div
  class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 
         border-b border-gray-200 bg-white text-gray-900 shadow-sm 
         px-4 sm:gap-x-6 sm:px-6 transition-all duration-300 lg:pl-28
         dark:bg-gray-900 dark:border-gray-700 dark:text-white"
>

  <!-- Separator -->
  <div class="h-6 w-px bg-gray-200 dark:bg-gray-700 lg:hidden" aria-hidden="true"></div>

  <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
    <!-- Page title -->
    <div class="relative flex flex-1 items-center">
      <h1 class="text-xl font-bold leading-6 text-primary dark:text-white">
        {{ $slot }}
      </h1>
    </div>

    <!-- Right section -->
    <div class="flex items-center gap-x-4 lg:gap-x-6">

      <!-- Theme toggle -->
      <button 
        @click="dark = !dark; localStorage.setItem('theme', dark ? 'dark' : 'light')"
        class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 transition-all duration-200">
        <svg id="sun-icon" class="h-5 w-5 hidden dark:block text-gray-300" viewBox="0 0 24 24" fill="none" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>
        <svg id="moon-icon" class="h-5 w-5 dark:hidden text-gray-700" viewBox="0 0 24 24" fill="none" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
        </svg>
      </button>

      <!-- Separator -->
      <div class="hidden lg:block lg:h-6 lg:w-px bg-gray-200 dark:bg-gray-700" aria-hidden="true"></div>

      <!-- Profile dropdown -->
      @php
        $name = Auth::user()->name ?? 'User';
        $email = Auth::user()->email ?? 'user@example.com';
        $role = Auth::user()->role->name ?? 'User';
      @endphp

      <div class="relative" x-data="{ open: false }">
        <button @click="open = !open" @click.away="open = false" type="button" class="-m-1.5 flex items-center p-1.5">
          <span class="sr-only">Open user menu</span>
          <img class="h-8 w-8 rounded-full object-cover bg-gray-100 dark:bg-gray-700"
               src="https://ui-avatars.com/api/?name={{ urlencode($name) }}" 
               alt="User avatar" />
          <span class="hidden lg:flex lg:items-center">
          </span>
        </button>

        <!-- Dropdown -->
        <div x-show="open"
             x-transition:enter="transition ease-out duration-100"
             x-transition:enter-start="transform opacity-0 scale-95"
             x-transition:enter-end="transform opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-75"
             x-transition:leave-start="transform opacity-100 scale-100"
             x-transition:leave-end="transform opacity-0 scale-95"
             class="absolute right-0 z-50 mt-2 w-64 origin-top-right rounded-lg bg-white dark:bg-gray-800 shadow-xl ring-1 ring-black/10 p-4"
             style="display: none;">

          <!-- User info -->
          <div class="flex items-center space-x-4 border-b border-gray-200 dark:border-gray-600 mb-4 pb-4">
            <img src="https://ui-avatars.com/api/?name={{ urlencode($name) }}"
                 alt="Profile picture"
                 class="w-14 h-14 rounded-full object-cover bg-gray-100 dark:bg-gray-700">
            <div>
              <div class="text-sm font-semibold text-gray-900 dark:text-white">{{ $name }}</div>
              <div class="text-xs text-gray-500 dark:text-gray-300">{{ $email }}</div>
              <div class="mt-1 inline-flex items-center gap-1 px-2 py-0.5 text-xs bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300 rounded-full">
                <x-heroicon-o-user class="w-4 h-4" />
                <span>{{ $role }}</span>
              </div>
            </div>
          </div>

          <!-- Settings -->
          <a href="{{ route('profile.settings') }}"
             class="flex items-center justify-between pl-3 pr-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">
            <span class="flex items-center gap-2">
              <x-heroicon-o-cog-6-tooth class="w-5 h-5" />
              Settings
            </span>
            <x-heroicon-o-chevron-right class="w-5 h-5 text-gray-400 dark:text-gray-200" />
          </a>

          <!-- Logout -->
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="flex items-center gap-2 w-full text-left pl-3 pr-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-red-50 dark:hover:bg-red-600/20 rounded">
              <x-heroicon-o-arrow-right-on-rectangle class="w-5 h-5" />
              Sign out
            </button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
