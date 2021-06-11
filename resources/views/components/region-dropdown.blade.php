<div class="relative inline-block text-left" id="dropdown">
    <div class="relative" x-data="{ isOpen: false }">
        <button @click="isOpen = !isOpen"
            class="inline-flex justify-center w-full px-4 py-2 text-xl font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm dark:text-white dark:border-teal-700 dark:bg-dark hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-teal-600 dark:focus:ring-transparent dark:hover:bg-darker focus:ring-offset-gray-100 focus:ring-indigo-500">
            {{ $numberedRegion->slug . ' ' . $numberedRegion->number }}
            <svg class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
        </button>

        <!-- Dropdown card -->
        <div @click.away="isOpen = false" x-show.transition.opacity="isOpen"
            class="absolute z-10 w-40 mt-1 text-base transform bg-white rounded-md shadow-lg dark:bg-darker">
            <ul class="flex flex-col p-2 my-2 space-y-1">
                @foreach ($regions as $region)
                    @if ($region->number)
                        <li>
                            <a href="{{ route(Route::currentRouteName(), ['region' => $region->name, 'number' => $region->number]) }}"
                                class="block px-2 py-1 transition rounded-md dark:text-gray-200 dark:hover:bg-dark hover:bg-gray-100">
                                {{ $region->slug . ' ' . $region->number }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
