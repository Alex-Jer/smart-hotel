<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard - Hotel Inteligente</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/styles.css" />
    <link rel="stylesheet" href="/css/app.css" />
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
</head>

<body>
    <div>
        <div class="flex h-screen overflow-y-hidden bg-white dark:bg-dark">

            <!-- Sidebar e Topbar -->
            <x-dashboard.sidebar :regions="$regions" />

            <!-- Main content -->
            <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">

                <!-- Main content header -->
                <div class="flex flex-col items-start justify-between @if (!$isRoot) pb-6 space-y-4 border-b @endif dark:border-darker dark:text-light lg:items-center
                    lg:space-y-0 lg:flex-row">
                    <h1 class="text-2xl font-semibold whitespace-nowrap">{{ $title }}</h1>
                </div>

                {{ $slot }}

            </main>

            <!-- Footer -->
            <x-dashboard.footer />

        </div>
    </div>

    <script src="https://kit.fontawesome.com/6bed2cc76e.js" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>

    @livewireScripts
</body>

</html>
