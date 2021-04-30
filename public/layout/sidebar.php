      <!-- Loading screen -->
      <div x-ref="loading" class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50" style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
        Loading.....
      </div>

      <!-- Sidebar backdrop -->
      <div x-show.in.out.opacity="isSidebarOpen" class="fixed inset-0 z-10 bg-black bg-opacity-20 lg:hidden" style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"></div>

      <!-- Sidebar -->
      <aside x-transition:enter="transition transform duration-300" x-transition:enter-start="-translate-x-full opacity-30  ease-in" x-transition:enter-end="translate-x-0 opacity-100 ease-out" x-transition:leave="transition transform duration-300" x-transition:leave-start="translate-x-0 opacity-100 ease-out" x-transition:leave-end="-translate-x-full opacity-0 ease-in" class="fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform bg-white border-r shadow-lg dark:bg-darker dark:border-dark lg:z-auto lg:static lg:shadow-none" :class="{'-translate-x-full lg:translate-x-0 lg:w-20': !isSidebarOpen}">

        <!-- sidebar header -->
        <div class="flex items-center justify-between flex-shrink-0 p-2" :class="{'lg:justify-center': !isSidebarOpen}">
          <span class="p-2 text-xl font-semibold leading-8 tracking-wider uppercase whitespace-nowrap">
            <span :class="{'lg:hidden': !isSidebarOpen}">Smart Hotel</span>
          </span>
          <button @click="toggleSidbarMenu()" class="p-2 rounded-md lg:hidden">
            <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- Sidebar links -->
        <nav class="flex-1 overflow-hidden hover:overflow-y-auto">
          <ul class="p-2 overflow-hidden">
            <li>
              <a href="dashboard" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100" :class="{'justify-center': !isSidebarOpen}">
                <span>
                  <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                  </svg>
                </span>
                <span :class="{ 'lg:hidden': !isSidebarOpen }">Dashboard</span>
              </a>
            </li>
            <!-- Sidebar Links... -->
          </ul>
        </nav>

        <!-- Sidebar footer -->
        <div class="flex-shrink-0 p-2 border-t max-h-14">
          <button href="dashboard" class="flex items-center justify-center w-full px-4 py-2 space-x-1 font-medium tracking-wider uppercase bg-gray-100 border rounded-md focus:outline-none focus:ring">
            <span>
              <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
              </svg>
            </span>
            <span :class="{'lg:hidden': !isSidebarOpen}"> Logout </span>
          </button>
        </div>
      </aside>

      <div class="flex flex-col flex-1 h-full overflow-hidden">
        <!-- Navbar -->
        <header class="flex-shrink-0 border-b dark:border-darker dark:bg-darker">
          <div class="flex items-center justify-between p-2">
            <!-- Navbar left -->
            <div class="flex items-center space-x-3 ">
              <span class="p-2 text-xl font-semibold tracking-wider uppercase lg:hidden"></span>
              <!-- Toggle sidebar button -->
              <button @click="toggleSidbarMenu()" class="p-2 rounded-md focus:outline-none focus:ring">
                <svg class="w-4 h-4 text-gray-600" :class="{'transform transition-transform -rotate-180': isSidebarOpen}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                </svg>
              </button>
            </div>

            <!-- Navbar right -->
            <div class="relative flex items-center space-x-3">

              <div class="items-center hidden space-x-3 md:flex">
                <!-- Notification Button -->
                <div class="relative" x-data="{ isOpen: false }">
                  <button @click="isOpen = !isOpen" class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring">
                    <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                  </button>

                  <!-- Dropdown card -->
                  <div @click.away="isOpen = false" x-show.transition.opacity="isOpen" class="absolute w-48 max-w-md mt-3 transform bg-white rounded-md shadow-lg -translate-x-3/4 min-w-max">
                    <div class="p-4 font-medium border-b">
                      <span class="text-gray-800">Notification</span>
                    </div>
                    <ul class="flex flex-col p-2 my-2 space-y-1">
                      <li>
                        <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Link</a>
                      </li>
                      <li>
                        <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Another Link</a>
                      </li>
                    </ul>
                    <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                      <a href="#">See All</a>
                    </div>
                  </div>
                </div>

                <!-- Options Button -->
                <div class="relative" x-data="{ isOpen: false }">
                  <button @click="isOpen = !isOpen" class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring">
                    <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                  </button>

                  <!-- Dropdown card -->
                  <div @click.away="isOpen = false" x-show.transition.opacity="isOpen" class="absolute w-40 max-w-sm mt-3 transform bg-white rounded-md shadow-lg -translate-x-3/4 min-w-max">
                    <div class="p-4 font-medium border-b">
                      <span class="text-gray-800">Options</span>
                    </div>
                    <ul class="flex flex-col p-2 my-2 space-y-1">
                      <li>
                        <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Link</a>
                      </li>
                      <li>
                        <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Another Link</a>
                      </li>
                    </ul>
                    <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                      <a href="#">See All</a>
                    </div>
                  </div>
                </div>
              </div>

              <!-- avatar button -->
              <div class="relative" x-data="{ isOpen: false }">
                <button @click="isOpen = !isOpen" class="p-1 bg-gray-200 rounded-full focus:outline-none focus:ring">
                  <img class="object-cover w-8 h-8 rounded-full" src="https://avatars0.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4" alt="Ahmed Kamel" />
                </button>
                <!-- green dot -->
                <div class="absolute right-0 p-1 bg-green-400 rounded-full bottom-3 animate-ping"></div>
                <div class="absolute right-0 p-1 bg-green-400 border border-white rounded-full bottom-3"></div>

                <!-- Dropdown card -->
                <div @click.away="isOpen = false" x-show.transition.opacity="isOpen" class="absolute mt-3 transform -translate-x-full bg-white rounded-md shadow-lg min-w-max">
                  <div class="flex flex-col p-4 space-y-1 font-medium border-b">
                    <span class="text-gray-800">Ahmed Kamel</span>
                    <span class="text-sm text-gray-400">ahmed.kamel@example.com</span>
                  </div>
                  <ul class="flex flex-col p-2 my-2 space-y-1">
                    <li>
                      <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Link</a>
                    </li>
                    <li>
                      <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Another Link</a>
                    </li>
                  </ul>
                  <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                    <a href="#">Logout</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </header>