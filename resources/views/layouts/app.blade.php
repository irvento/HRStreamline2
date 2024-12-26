<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Your application description here">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
</head>

<body class="font-sans antialiased">

    <!-- Notification Popup -->
    <div x-data="{ show: false, message: '' }" x-init="() => {
        if ({{ session('success') ? 'true' : 'false' }}) {
            window.addEventListener('load', () => {
                setTimeout(() => { show = true;
                    message = '{{ session('success') }}'; }, 500);
                setTimeout(() => { show = false;
                    message = ''; }, 3000);
            });
        }
    }" x-show="message !== ''" x-text="message"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform translate-y-2"
        class="fixed top-4 left-1/2 transform -translate-x-1/2 bg-green-500 text-white py-2 px-4 rounded shadow-lg z-50">
    </div>

    <!-- Loading Overlay -->
    <div x-data="{ loading: false }" x-show="loading" x-transition:enter="transition ease-out duration-500"
        x-transition:leave="transition ease-out duration-1000"
        class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-75 z-50">
        <div class="text-white text-xl">
            <div class="flex justify-center items-center h-screen">
                <div class="flex flex-row gap-2">
                    <div class="w-4 h-4 rounded-full bg-blue-700 animate-bounce"></div>
                    <div class="w-4 h-4 rounded-full bg-blue-700 animate-bounce [animation-delay:-.3s]"></div>
                    <div class="w-4 h-4 rounded-full bg-blue-700 animate-bounce [animation-delay:-.5s]"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">
        @include('layouts.sidenav') <!-- Side Navigation -->

        <div class="px-4 flex-1 flex flex-col">
            @include('layouts.navigation') <!-- Top Navigation -->

            <!-- Page Heading -->
            <div class="flex-1 p-6 overflow-y-auto">
                @isset($header)
                    <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main>
                    <div class="container-fluid">
                        <div class="column">
                            <!-- Main Content -->
                            <div class="col-md-9 col-lg-10 ms-sm-auto px-md-4 py-4">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </main>

                <!-- Footer -->
                <footer class="bg-gray-200 dark:bg-gray-800 py-4">
                    <div class="max-w-7xl mx-auto text-center text-sm text-gray-600 dark:text-gray-400">
                        © {{ now()->year }} {{ 'HRStreameline' }}. All rights reserved.
                    </div>
                </footer>
            </div>
        </div>
    </div>
</body>

</html>
