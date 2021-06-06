<!-- Sidebar backdrop -->
<div class="fixed inset-0 z-10 bg-black bg-opacity-20 lg:hidden sidebar-backdrop"></div>

<!-- Sidebar -->
<aside id="sidebar" onmouseover="openSidebar()" onmouseout="closeSidebar()"
    class="fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform bg-white border-r shadow-lg dark:bg-darker dark:border-teal-700 lg:z-auto lg:static lg:shadow-none">

    <!-- Sidebar header -->
    <div class="flex items-center justify-between flex-shrink-0 p-2 dark:text-light">
        <span class="p-2 text-xl font-semibold leading-8 tracking-wider uppercase whitespace-nowrap">
            <span class="invisible" id="title">Smart Hotel</span>
        </span>
        <button class="p-2 rounded-md lg:hidden" onclick="closeSidebarMobile()">
            <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Sidebar links -->
    <nav class="flex-1 overflow-hidden select-none hover:overflow-y-auto">
        <ul class="p-2 overflow-hidden dark:text-light">
            <li>
                <a href="/" class="flex items-center p-2 space-x-2 rounded-md dark:hover:bg-dark hover:bg-gray-100
                    {{ request()->is('/') ? 'dark:bg-ocean-700 bg-gray-200' : '' }} ">
                    <span>

                        <svg class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="#9ca3af">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </span>
                    <span class="sidebar-item">Dashboard</span>
                </a>
            </li>
            <li>
                <div class="dropdown" onclick="sidebarToggleSubmenu()">
                    <ul>
                        <li>
                            <div class="flex items-center p-2 space-x-2 rounded-md cursor-pointer dark:hover:bg-dark hover:bg-gray-100
                                {{ request()->is('logs*') ? 'dark:bg-ocean-700 bg-gray-200' : '' }}" id="sidebar-logs">
                                <span>
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#9ca3af">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="sidebar-item">Logs</span>
                                <span aria-hidden="true" style="margin-left:auto">
                                    <svg class="w-4 h-4 transition-transform transform" id="sidebar-logs-chevron"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                        </path>
                                    </svg>
                                </span>
                            </div>

                            <div class="bg-white dropdown-content dark:bg-darker sidebar-item">
                                @foreach ($regions->unique('name') as $region)
                                    <a href="{{ route('logs', ['region' => $region->name, 'number' => $region->number]) }}"
                                        class="flex items-center p-2 space-x-2 rounded-md dark:hover:bg-dark hover:bg-gray-100
                                         {{ request()->is('*' . $region->name . '*') ? 'dark:text-gray-100 text-gray-500 font-medium' : 'text-gray-400' }}">
                                        <span>{{ $region->slug }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Sidebar footer -->
    <div class="flex-shrink-0 p-2 border-t dark:border-teal-700 max-h-14">
        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                class="flex items-center justify-center w-full px-4 py-2 space-x-1 font-medium tracking-wider uppercase bg-gray-100 border rounded-md dark:bg-dark dark:border-darker focus:outline-none dark:text-light focus:ring">
                <span>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#9ca3af">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </span>
                <span id="logout"> Logout </span>
            </a>
        </form>
    </div>
</aside>

<div class="flex flex-col flex-1 h-full overflow-hidden">
    <!-- Navbar -->
    <header class="flex-shrink-0 border-b dark:border-teal-700 dark:bg-darker">
        <div class="flex items-center justify-between p-2">
            <!-- Navbar left -->
            <div class="flex items-center space-x-3 ">
                <span class="p-2 text-xl font-semibold tracking-wider uppercase lg:hidden"></span>
                <!-- Toggle sidebar button -->
                <button class="p-2 rounded-md lg:invisible focus:outline-none focus:ring" onclick="openSidebarMobile()">
                    <svg class="w-4 h-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <!-- Navbar right -->
            <div class="relative flex items-center space-x-3">

                <!-- Desktop Right buttons -->
                <button onclick="toggleDark()"
                    class="flex justify-center py-2 text-gray-500 bg-gray-100 rounded-md dark:text-gray-200 dark:bg-gray-800 lg:dark:bg-transparent lg:bg-transparent lg:p-2 hover:bg-gray-100 focus:bg-gray-100 dark:hover:bg-gray-800 dark:focus:bg-gray-800 focus:outline-none">
                    <svg id="sun-icon" class="hidden w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            clip-rule="evenodd" />
                    </svg>

                    <svg id="moon-icon" class="w-5 h-5 transform -rotate-90" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                    </svg>
                </button>

                <!-- Avatar button -->
                <div class="relative">
                    <div class="relative" x-data="{ isOpen: false }">
                        <button @click="isOpen = !isOpen" class="text-gray-700 dark:text-white drop-button focus:outline-none">
                            {{ auth()->user()->name }}
                            <svg class="inline h-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </button>

                        <!-- Dropdown card -->
                        <div @click.away="isOpen = false" x-show.transition.opacity="isOpen"
                            class="absolute z-10 mt-4 transform -translate-x-full bg-white rounded-md shadow-lg dark:bg-darker min-w-max">
                            <div class="flex flex-col p-4 -space-y-px font-medium border-b dark:border-teal-700">
                                <span class="text-gray-800 dark:text-gray-200">{{ auth()->user()->name }}</span>
                                <span class="text-sm text-gray-400">{{ auth()->user()->email }}</span>
                            </div>
                            <ul class="flex flex-col p-2 my-2 space-y-1">
                                <li>
                                    <a href="{{ route('profile') }}"
                                        class="block px-2 py-1 transition rounded-md dark:text-gray-200 dark:hover:bg-dark hover:bg-gray-100">Profile</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
