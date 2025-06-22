<!DOCTYPE html>
<html lang="id" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Teacher Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .dark-transition {
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        }
        .sidebar-transition {
            transition: all 0.3s ease;
        }
        .sidebar-collapsed .sidebar-text {
            opacity: 0;
            width: 0;
            overflow: hidden;
        }
        .sidebar-collapsed .sidebar-item {
            justify-content: center;
        }
    </style>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 dark-transition">
    <!-- Fixed Header -->
    <header class="fixed top-0 left-0 right-0 z-30  bg-gray-800 dark:bg-gray-950 shadow-sm border-b border-gray-200 dark:border-gray-700 dark-transition">
        <div class="flex items-center justify-between px-4 py-3">
            <!-- Left Section: Hamburger + Logo/Title -->
            <div class="flex items-center space-x-4">
                <button id="sidebar-toggle" class="p-2 rounded-lg hover:bg-gray-700 dark:hover:bg-gray-800  transition-colors duration-200">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                
                <!-- Desktop: Logo + Page Title -->
                <div class="hidden md:flex items-center space-x-4">
                    <!-- Logo/Brand -->
                    <div class="flex items-center space-x-2">
                        <span class="text-xl font-medium text-white">Learnity</span>
                    </div>
                    
                    <!-- Page Title with separator -->
                    <div class="flex items-center">
                        <div class="h-6 w-px bg-gray-300 dark:bg-gray-600 mr-4"></div>
                        <span class="font-medium text-lg text-white">
                            @yield('header')
                        </span>
                    </div>
                </div>
                
                <!-- Mobile: Page Title only (next to hamburger) -->
                <div class="md:hidden">
                    <span class="font-medium text-lg text-white">
                        
                        @if(request()->routeIs('teacher.dashboard'))
                            Dashboard
                        @elseif(request()->routeIs('teacher.courses'))
                            My Courses
                        @elseif(request()->routeIs('teacher.quiz'))
                            Quiz
                        @elseif(request()->routeIs('teacher.students'))
                            Students
                        @elseif(request()->routeIs('teacher.inbox'))
                            Inbox
                        @else
                            @yield('page_title', 'Dashboard')
                        @endif
                    </span>
                </div>
            </div>

            <!-- Right Section: User Menu -->
            <div class="flex items-center space-x-4">
                <button id="theme-toggle" class="p-2 rounded-full hover:bg-gray-700 transition-all duration-200">
                    <svg id="sun-icon" class="h-5 w-5 hidden dark:block text-gray-300 dark:text-gray-300" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>  
                    <svg id="moon-icon" class="h-5 w-5 dark:hidden text-gray-300 dark:text-gray-300" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>
                
                <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center text-gray-700">
                    <span class="text-xs font-medium">AU</span>
                </div>
            </div>
        </div>
    </header>

    <div class="flex min-h-screen pt-16">
        <!-- Collapsible Sidebar -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-20 bg-gray-800 dark:bg-gray-950 border-r border-gray-200 dark:border-gray-700 sidebar-transition pt-16 w-64 -translate-x-full lg:translate-x-0">
            <!-- Sidebar Content -->
            <nav class="h-full overflow-y-auto px-3 py-4">
                <!-- Main Navigation -->
                <div class="space-y-1">
                    <div class="space-y-1">
                        <!-- Dashboard -->
                        <a href="{{ route('teacher.dashboard') }}"
                        class="sidebar-item flex items-center gap-3 px-3 py-3 mb-1 rounded-lg transition duration-200
                                hover:bg-gray-700 dark:hover:bg-gray-800
                                {{ request()->routeIs('teacher.dashboard') ? 'bg-gray-700 dark:bg-gray-800 text-white font-semibold' : 'text-gray-300' }} group/item">
                            <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            <span class="sidebar-text transition-all duration-300 whitespace-nowrap">Dashboard</span>
                        </a>

                        <!-- My Courses -->
                        <a href="{{ route('teacher.courses') }}"
                        class="sidebar-item flex items-center gap-3 px-3 py-3 mb-1 rounded-lg transition duration-200
                                hover:bg-gray-700 dark:hover:bg-gray-800
                                {{ request()->routeIs('teacher.courses', 'teacher.courses.*') ? 'bg-gray-700 dark:bg-gray-800 text-white font-semibold' : 'text-gray-300' }} group/item">
                            <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"/>
                            </svg>
                            <span class="sidebar-text transition-all duration-300 whitespace-nowrap">My Courses</span>
                        </a>

                        <!-- Quiz -->
                        <a href="{{ route('teacher.quiz') }}"
                        class="sidebar-item flex items-center gap-3 px-3 py-3 mb-1 rounded-lg transition duration-200
                                hover:bg-gray-700 dark:hover:bg-gray-800
                                {{ request()->routeIs('teacher.quiz', 'teacher.quiz.*') ? 'bg-gray-700 dark:bg-gray-800 text-white font-semibold' : 'text-gray-300' }} group/item">
                            <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z"/>
                            </svg>
                            <span class="sidebar-text transition-all duration-300 whitespace-nowrap">Quiz</span>
                        </a>

                        <!-- Students -->
                        <a href="{{ route('teacher.students') }}"
                        class="sidebar-item flex items-center gap-3 px-3 py-3 mb-1 rounded-lg transition duration-200
                                hover:bg-gray-700 dark:hover:bg-gray-800
                                {{ request()->routeIs('teacher.students') ? 'bg-gray-700 dark:bg-gray-800 text-white font-semibold' : 'text-gray-300' }} group/item">
                            <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/>
                            </svg>
                            <span class="sidebar-text transition-all duration-300 whitespace-nowrap">Student</span>
                        </a>

                        <!-- Inbox -->
                        <a href="{{ route('teacher.inbox') }}"
                        class="sidebar-item flex items-center gap-3 px-3 py-3 mb-1 rounded-lg transition duration-200
                                hover:bg-gray-700 dark:hover:bg-gray-800
                                {{ request()->routeIs('teacher.inbox') ? 'bg-gray-700 dark:bg-gray-800 text-white font-semibold' : 'text-gray-300' }} group/item">
                            <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3"/>
                            </svg>
                            <span class="sidebar-text transition-all duration-300 whitespace-nowrap">Inbox</span>
                        </a>
                    </div>

            </nav>
        </aside>

        <!-- Main Content Area -->
        <main id="main-content" class="flex-1 transition-all duration-300 lg:ml-64">
            <div class="p-6">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-300 px-4 py-3 rounded-lg mb-6 flex items-center dark-transition">
                        <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 text-red-800 dark:text-red-300 px-4 py-3 rounded-lg mb-6 flex items-center dark-transition">
                        <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 text-red-800 dark:text-red-300 px-4 py-3 rounded-lg mb-6 dark-transition">
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            <strong>Terjadi kesalahan:</strong>
                        </div>
                        <ul class="list-disc list-inside space-y-1 ml-7">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Main Content -->
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Overlay for mobile -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-10 hidden"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const sidebarOverlay = document.getElementById('sidebar-overlay');
            const mainContent = document.getElementById('main-content');
            const themeToggle = document.getElementById('theme-toggle');
            const html = document.documentElement;
            
            let sidebarOpen = false;
            let sidebarCollapsed = false;

            // Theme functionality
            function setTheme(isDark) {
                if (isDark) {
                    html.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                } else {
                    html.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                }
            }

            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            
            if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
                setTheme(true);
            } else {
                setTheme(false);
            }

            themeToggle.addEventListener('click', function() {
                const isDark = html.classList.contains('dark');
                setTheme(!isDark);
            });

            // Check if mobile
            function isMobile() {
                return window.innerWidth < 1024;
            }

            // Toggle sidebar
            function toggleSidebar() {
                if (isMobile()) {
                    // Mobile behavior
                    sidebarOpen = !sidebarOpen;
                    if (sidebarOpen) {
                        sidebar.classList.remove('-translate-x-full');
                        sidebar.classList.add('translate-x-0');
                        sidebarOverlay.classList.remove('hidden');
                    } else {
                        sidebar.classList.add('-translate-x-full');
                        sidebar.classList.remove('translate-x-0');
                        sidebarOverlay.classList.add('hidden');
                    }
                } else {
                    // Desktop behavior
                    sidebarCollapsed = !sidebarCollapsed;
                    if (sidebarCollapsed) {
                        sidebar.classList.add('sidebar-collapsed');
                        sidebar.style.width = '4rem';
                        mainContent.style.marginLeft = '4rem';
                    } else {
                        sidebar.classList.remove('sidebar-collapsed');
                        sidebar.style.width = '16rem';
                        mainContent.style.marginLeft = '16rem';
                    }
                }
            }

            // Initialize sidebar state
            function initializeSidebar() {
                if (isMobile()) {
                    // Mobile: sidebar hidden by default
                    sidebarOpen = false;
                    sidebar.classList.add('-translate-x-full');
                    sidebar.classList.remove('translate-x-0');
                    sidebarOverlay.classList.add('hidden');
                    mainContent.style.marginLeft = '0';
                    sidebar.style.width = '16rem';
                    sidebar.classList.remove('sidebar-collapsed');
                } else {
                    // Desktop: sidebar visible by default
                    sidebarOpen = true;
                    sidebarCollapsed = false;
                    sidebar.classList.remove('-translate-x-full');
                    sidebar.classList.add('translate-x-0');
                    sidebar.classList.remove('sidebar-collapsed');
                    sidebarOverlay.classList.add('hidden');
                    sidebar.style.width = '16rem';
                    mainContent.style.marginLeft = '16rem';
                }
            }

            // Event listeners
            sidebarToggle.addEventListener('click', toggleSidebar);
            sidebarOverlay.addEventListener('click', function() {
                if (isMobile() && sidebarOpen) {
                    toggleSidebar();
                }
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                initializeSidebar();
            });

            // Initialize on load
            initializeSidebar();

            // Dropdown functionality
            window.toggleDropdown = function(dropdownId) {
                const dropdown = document.getElementById(dropdownId);
                const arrow = document.getElementById(dropdownId.replace('-dropdown', '-arrow'));
                
                if (dropdown.classList.contains('hidden')) {
                    dropdown.classList.remove('hidden');
                    arrow.style.transform = 'rotate(180deg)';
                } else {
                    dropdown.classList.add('hidden');
                    arrow.style.transform = 'rotate(0deg)';
                }
            };
        });
    </script>

    @push('scripts')
    <script>
        function courseModal() {
            return {
                showModal: false,
                selectedCourse: null,
                openModal(course) {
                    this.selectedCourse = course;
                    this.showModal = true;
                },
                closeModal() {
                    this.showModal = false;
                    this.selectedCourse = null;
                }
            };
        }
    </script>
    @endpush
@stack('scripts')
</body>
</html>