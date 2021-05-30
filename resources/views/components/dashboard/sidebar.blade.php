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
    <nav class="flex-1 overflow-hidden hover:overflow-y-auto">
        <ul class="p-2 overflow-hidden dark:text-light">
            <li>
                <a href="dashboard"
                    class="flex items-center p-2 space-x-2 rounded-md dark:hover:bg-dark hover:bg-gray-100">
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
                <div class="dropdown">
                    <div class="flex items-center p-2 space-x-2 rounded-md dark:hover:bg-dark hover:bg-gray-100">
                        <span>
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#9ca3af">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                </path>
                            </svg>
                        </span>
                        <span class="sidebar-item">Terraço</span> <!-- Temporário -->
                    </div>
                    <div class="bg-white dropdown-content dark:bg-darker">
                        <a href="logs?region=rooftop&sensor=solar_panel"
                            class="flex items-center p-2 space-x-2 rounded-md dark:hover:bg-dark hover:bg-gray-100">
                            <span>
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#9ca3af">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </span>
                            <span class="sidebar-item">Painel Solar</span> <!-- Temporário -->
                        </a>
                        <a href="logs?region=rooftop&sensor=solar_battery"
                            class="flex items-center p-2 space-x-2 rounded-md dark:hover:bg-dark hover:bg-gray-100">
                            <span>
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#9ca3af">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </span>
                            <span class="sidebar-item">Bateria</span> <!-- Temporário -->
                        </a>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown">
                    <div class="flex items-center p-2 space-x-2 rounded-md dark:hover:bg-dark hover:bg-gray-100">
                        <span>
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#9ca3af">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                </path>
                            </svg>
                        </span>
                        <span class="sidebar-item">Quartos</span> <!-- Temporário -->
                    </div>
                    <div class="bg-white dropdown-content dark:bg-darker">
                        <a href="logs?region=rooms&number=1&sensor=ac"
                            class="flex items-center p-2 space-x-2 rounded-md dark:hover:bg-dark hover:bg-gray-100">
                            <span>
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#9ca3af">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </span>
                            <span class="sidebar-item">Ar Condicionado</span> <!-- Temporário -->
                        </a>
                        <a href="logs?region=rooms&number=1&sensor=door"
                            class="flex items-center p-2 space-x-2 rounded-md dark:hover:bg-dark hover:bg-gray-100">
                            <span>
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#9ca3af">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </span>
                            <span class="sidebar-item">Porta</span> <!-- Temporário -->
                        </a>
                        <a href="logs?region=rooms&number=1&sensor=smoke"
                            class="flex items-center p-2 space-x-2 rounded-md dark:hover:bg-dark hover:bg-gray-100">
                            <span>
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#9ca3af">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </span>
                            <span class="sidebar-item">Detetor de Fumo</span> <!-- Temporário -->
                        </a>
                        <a href="logs?region=rooms&number=1&sensor=humidity"
                            class="flex items-center p-2 space-x-2 rounded-md dark:hover:bg-dark hover:bg-gray-100">
                            <span>
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#9ca3af">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </span>
                            <span class="sidebar-item">Humidade</span> <!-- Temporário -->
                        </a>
                        <a href="logs?region=rooms&number=1&sensor=temperature"
                            class="flex items-center p-2 space-x-2 rounded-md dark:hover:bg-dark hover:bg-gray-100">
                            <span>
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#9ca3af">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </span>
                            <span class="sidebar-item">Temperatura</span> <!-- Temporário -->
                        </a>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown">
                    <div class="flex items-center p-2 space-x-2 rounded-md dark:hover:bg-dark hover:bg-gray-100">
                        <span>
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#9ca3af">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                </path>
                            </svg>
                        </span>
                        <span class="sidebar-item">Piscina</span> <!-- Temporário -->
                    </div>
                    <div class="bg-white dropdown-content dark:bg-darker">
                        <a href="logs?region=pool&sensor=lights"
                            class="flex items-center p-2 space-x-2 rounded-md dark:hover:bg-dark hover:bg-gray-100">
                            <span>
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#9ca3af">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </span>
                            <span class="sidebar-item">Iluminação</span> <!-- Temporário -->
                        </a>
                        <a href="logs?region=pool&sensor=temperature"
                            class="flex items-center p-2 space-x-2 rounded-md dark:hover:bg-dark hover:bg-gray-100">
                            <span>
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#9ca3af">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </span>
                            <span class="sidebar-item">Temperatura</span> <!-- Temporário -->
                        </a>
                    </div>
                </div>
            </li>
            <li>
                <a href="logs?region=parking&sensor=barrier"
                    class="flex items-center p-2 space-x-2 rounded-md dark:hover:bg-dark hover:bg-gray-100">
                    <span>
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#9ca3af">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                            </path>
                        </svg>
                    </span>
                    <span class="sidebar-item">Estacionamento</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Sidebar footer -->
    <div class="flex-shrink-0 p-2 border-t dark:border-teal-700 max-h-14">
        <button onclick="location.href='logout'"
            class="flex items-center justify-center w-full px-4 py-2 space-x-1 font-medium tracking-wider uppercase bg-gray-100 border rounded-md dark:bg-dark dark:border-darker focus:outline-none dark:text-light focus:ring">
            <span>
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="#9ca3af">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </span>
            <span id="logout"> Logout </span>
        </button>
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
                    <svg class="w-4 h-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <!-- Navbar right -->
            <div class="relative flex items-center space-x-3">

                <!-- Mobile Toggle Dark Theme Button -->
                <label class="flex items-center visible sm:invisible">
                    <input type="checkbox" onclick="toggleTheme()" id="dark-theme-toggle"
                        class="relative w-10 h-5 transition-all duration-200 ease-in-out bg-gray-400 rounded-full shadow-inner outline-none appearance-none"
                        checked />
                    <span class="ml-2"></span>
                </label>

                <!-- Desktop Right buttons -->
                <div class="items-center hidden space-x-3 md:flex">

                    <!-- Toggle Dark Theme Button -->
                    <label class="flex items-center">
                        <input type="checkbox" id="dark-theme-toggle-mobile" onclick="toggleTheme()"
                            class="relative w-10 h-5 transition-all duration-200 ease-in-out bg-gray-400 rounded-full shadow-inner outline-none appearance-none"
                            checked />
                        <span class="ml-2"></span>
                    </label>

                </div>

                <!-- Avatar button -->
                <div class="relative">
                    <button class="p-1 bg-gray-200 rounded-full cursor-default dark:bg-ocean-400 focus:outline-none">
                        <img class="object-cover w-8 h-8 rounded-full" src="/img/profile_pic.png"
                            alt="Profile Picture" />
                    </button>

                </div>
            </div>
        </div>
    </header>
