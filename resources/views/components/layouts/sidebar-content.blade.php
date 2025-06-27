@props(['collapsed' => false, 'mobile' => false])

@php
    $role = auth()->user()?->role?->name ?? 'guest';
@endphp

<nav class="flex flex-1 flex-col">
  <ul role="list" class="flex flex-1 flex-col gap-y-3">

    {{-- DASHBOARD --}}
    <li>
      <a href="{{ route('dashboard') }}"
        class="group flex items-center gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors duration-200
          {{ request()->routeIs('*.dashboard') ? 'bg-gray-800 text-white dark:bg-gray-700' : 'text-gray-400' }}"
        :class="{
            'hover:bg-gray-700 hover:text-white dark:hover:bg-gray-600': true,
            'justify-center': collapsed
        }">
        <x-heroicon-o-home class="h-6 w-6 shrink-0" />
        <span class="transition-opacity duration-300"
              :class="{ 'opacity-0 hidden': collapsed, 'opacity-100': !collapsed }">
          Dashboard
        </span>
      </a>
    </li>

    {{-- STUDENT MENU --}}
    @if($role === 'student')
      <li>
        <a href="{{ route('search') }}"
           class="group flex items-center gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold
           {{ request()->routeIs('search') ? 'bg-gray-800 text-white dark:bg-gray-700' : 'text-gray-400 hover:text-white hover:bg-gray-800 dark:hover:bg-gray-700' }}"
           :class="{'justify-center': {{ $collapsed ? 'true' : 'collapsed' }}}">
          <x-heroicon-o-academic-cap class="h-6 w-6 shrink-0" />
          <span :class="{'opacity-0 hidden': {{ $collapsed ? 'true' : 'collapsed' }},
                         'opacity-100': !{{ $collapsed ? 'true' : 'collapsed' }}}"
                class="transition-opacity duration-300">Search</span>
        </a>
      </li>

      <li>
        <a href="{{ route('schedule') }}"
           class="group flex items-center gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold
           {{ request()->routeIs('schedule') ? 'bg-gray-800 text-white dark:bg-gray-700' : 'text-gray-400 hover:text-white hover:bg-gray-800 dark:hover:bg-gray-700' }}"
           :class="{'justify-center': {{ $collapsed ? 'true' : 'collapsed' }}}">
          <x-heroicon-o-calendar class="h-6 w-6 shrink-0" />
          <span :class="{'opacity-0 hidden': {{ $collapsed ? 'true' : 'collapsed' }},
                         'opacity-100': !{{ $collapsed ? 'true' : 'collapsed' }}}"
                class="transition-opacity duration-300">Schedule</span>
        </a>
      </li>

      <li>
        <a href="{{ route('learnmap') }}"
           class="group flex items-center gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold
           {{ request()->routeIs('learnmap') ? 'bg-gray-800 text-white dark:bg-gray-700' : 'text-gray-400 hover:text-white hover:bg-gray-800 dark:hover:bg-gray-700' }}"
           :class="{'justify-center': {{ $collapsed ? 'true' : 'collapsed' }}}">
          <x-heroicon-o-map class="h-6 w-6 shrink-0" />
          <span :class="{'opacity-0 hidden': {{ $collapsed ? 'true' : 'collapsed' }},
                         'opacity-100': !{{ $collapsed ? 'true' : 'collapsed' }}}"
                class="transition-opacity duration-300">LearnMap</span>
        </a>
      </li>

      <li>
        <a href="{{ route('inbox') }}"
           class="group flex items-center gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold
           {{ request()->routeIs('inbox') ? 'bg-gray-800 text-white dark:bg-gray-700' : 'text-gray-400 hover:text-white hover:bg-gray-800 dark:hover:bg-gray-700' }}"
           :class="{'justify-center': {{ $collapsed ? 'true' : 'collapsed' }}}">
          <x-heroicon-o-inbox class="h-6 w-6 shrink-0" />
          <span :class="{'opacity-0 hidden': {{ $collapsed ? 'true' : 'collapsed' }},
                         'opacity-100': !{{ $collapsed ? 'true' : 'collapsed' }}}"
                class="transition-opacity duration-300">Inbox</span>
        </a>
      </li>

      <li class="border-t border-gray-700/30 my-1"></li>
    @endif

    {{-- TEACHER MENU --}}
    @if($role === 'teacher')
      <li>
        <a href="{{ route('teacher.courses') }}"
           class="group flex items-center gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold
           {{ request()->routeIs('teacher.courses', 'teacher.courses.*') ? 'bg-gray-800 text-white dark:bg-gray-700' : 'text-gray-400 hover:text-white hover:bg-gray-800 dark:hover:bg-gray-700' }}"
           :class="{'justify-center': {{ $collapsed ? 'true' : 'collapsed' }}}">
          <x-heroicon-o-book-open class="h-6 w-6 shrink-0" />
          <span :class="{'opacity-0 hidden': {{ $collapsed ? 'true' : 'collapsed' }},
                         'opacity-100': !{{ $collapsed ? 'true' : 'collapsed' }}}"
                class="transition-opacity duration-300">Courses</span>
        </a>
      </li>

      <li>
        <a href="{{ route('teacher.quiz') }}"
           class="group flex items-center gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold
           {{ request()->routeIs('teacher.quiz', 'teacher.quiz.*') ? 'bg-gray-800 text-white dark:bg-gray-700' : 'text-gray-400 hover:text-white hover:bg-gray-800 dark:hover:bg-gray-700' }}"
           :class="{'justify-center': {{ $collapsed ? 'true' : 'collapsed' }}}">
          <x-heroicon-o-clipboard-document-list class="h-6 w-6 shrink-0" />
          <span :class="{'opacity-0 hidden': {{ $collapsed ? 'true' : 'collapsed' }},
                         'opacity-100': !{{ $collapsed ? 'true' : 'collapsed' }}}"
                class="transition-opacity duration-300">Quiz</span>
        </a>
      </li>

      <li>
        <a href="{{ route('teacher.students') }}"
           class="group flex items-center gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold
           {{ request()->routeIs('teacher.students') ? 'bg-gray-800 text-white dark:bg-gray-700' : 'text-gray-400 hover:text-white hover:bg-gray-800 dark:hover:bg-gray-700' }}"
           :class="{'justify-center': {{ $collapsed ? 'true' : 'collapsed' }}}">
          <x-heroicon-o-users class="h-6 w-6 shrink-0" />
          <span :class="{'opacity-0 hidden': {{ $collapsed ? 'true' : 'collapsed' }},
                         'opacity-100': !{{ $collapsed ? 'true' : 'collapsed' }}}"
                class="transition-opacity duration-300">Students</span>
        </a>
      </li>

      <li class="border-t border-gray-700/30 my-1"></li>
    @endif

    {{-- ADMIN MENU --}}
    @if($role === 'admin')
      <li>
        <a href="{{ route('admin.news.index') }}"
           class="group flex items-center gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold
           {{ request()->routeIs('admin.news.*') ? 'bg-gray-800 text-white dark:bg-gray-700' : 'text-gray-400 hover:text-white hover:bg-gray-800 dark:hover:bg-gray-700' }}"
           :class="{'justify-center': {{ $collapsed ? 'true' : 'collapsed' }}}">
          <x-heroicon-o-newspaper class="h-6 w-6 shrink-0" />
          <span :class="{'opacity-0 hidden': {{ $collapsed ? 'true' : 'collapsed' }},
                         'opacity-100': !{{ $collapsed ? 'true' : 'collapsed' }}}"
                class="transition-opacity duration-300">Berita</span>
        </a>
      </li>

      <li>
        <a href="{{ route('admin.categories.index') }}"
           class="group flex items-center gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold
           {{ request()->routeIs('admin.categories.*') ? 'bg-gray-800 text-white dark:bg-gray-700' : 'text-gray-400 hover:text-white hover:bg-gray-800 dark:hover:bg-gray-700' }}"
           :class="{'justify-center': {{ $collapsed ? 'true' : 'collapsed' }}}">
          <x-heroicon-o-tag class="h-6 w-6 shrink-0" />
          <span :class="{'opacity-0 hidden': {{ $collapsed ? 'true' : 'collapsed' }},
                         'opacity-100': !{{ $collapsed ? 'true' : 'collapsed' }}}"
                class="transition-opacity duration-300">Kategori</span>
        </a>
      </li>

      <li>
        <a href="{{ url('/') }}"
           target="_blank"
           class="group flex items-center gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold
           text-gray-400 hover:text-white hover:bg-gray-800 dark:hover:bg-gray-700"
           :class="{'justify-center': {{ $collapsed ? 'true' : 'collapsed' }}}">
          <x-heroicon-o-globe-alt class="h-6 w-6 shrink-0" />
          <span :class="{'opacity-0 hidden': {{ $collapsed ? 'true' : 'collapsed' }},
                         'opacity-100': !{{ $collapsed ? 'true' : 'collapsed' }}}"
                class="transition-opacity duration-300">Lihat Website</span>
        </a>
      </li>

      <li class="border-t border-gray-700/30 my-1"></li>
    @endif
  </ul>
</nav>
