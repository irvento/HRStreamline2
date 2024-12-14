<div
    class="rounded-r-[20px] sticky top-0 z-10 flex flex-col bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 h-screen w-64">
    <!-- Logo and App Name -->
    <div class="flex items-center py-4 px-4">
        <a href="{{ route('dashboard') }}">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
        </a>
        <span class="ms-4 text-2xl font-semibold text-gray-800 dark:text-gray-200">HRStreamline</span>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 px-2 py-4 space-y-2 mt-4 mr-1">
        <ul class="space-y-1 ml-5">
            <li>
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
            </li>
            <!-- Add more links as needed -->
        </ul>
    </nav>
</div>
