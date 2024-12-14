<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Your application description here">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
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
                        <!-- Sidebar -->
                        <div class="col-md-3 col-lg-2 d-md-block bg-light sidebar vh-100">
                            <div class="position-sticky p-3">
                                <h4 class="text-primary mb-4">Navigation</h4>
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link text-dark">
                                            <i class="fas fa-home me-2"></i> Dashboard
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link text-dark">
                                            <i class="fas fa-user me-2"></i> Profile
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link text-dark">
                                            <i class="fas fa-cogs me-2"></i> Settings
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link text-dark">
                                            <i class="fas fa-chart-bar me-2"></i> Reports
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link text-dark">
                                            <i class="fas fa-question-circle me-2"></i> Help
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

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
                    © {{ now()->year }} {{'HRStreameline' }}. All rights reserved.
                </div>
            </footer>
        </div>
    </body>
</html>
