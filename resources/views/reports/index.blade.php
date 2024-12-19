<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reports') }}
        </h2>
    </x-slot>

    <div x-data="{ selectedTab: 'attendance' }" class="flex h-full mt-8">
        <!-- Side Navigation -->
        @include('reports.partials.sidebar')
        
        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</x-app-layout>

