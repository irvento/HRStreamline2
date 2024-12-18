<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Attendance Management') }}
        </h2>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto">
        <!-- Flash Messages -->
        @if(session('error'))
            <div class="bg-red-500 text-white p-4 rounded-md mb-6 shadow-md">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-md mb-6 shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <!-- Action Buttons -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">
                Manage Your Attendance
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Clock In Button -->
                <form method="POST" action="{{ route('attendance.login') }}">
                    @csrf
                    <button type="submit" 
                        class="w-full px-6 py-3 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800">
                        Log In (Clock In)
                    </button>
                </form>

                <!-- Clock Out Button -->
                <form method="POST" action="{{ route('attendance.logout') }}">
                    @csrf
                    <button type="submit" 
                        class="w-full px-6 py-3 bg-red-600 text-white font-medium rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 dark:focus:ring-offset-gray-800">
                        Log Out (Clock Out)
                    </button>
                </form>
            </div>

            <!-- Attendance History -->
            <div class="mt-6 text-center">
                <a href="{{ route('attendance.history') }}" 
                    class="inline-block px-6 py-2 bg-gray-600 text-white font-medium rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-offset-gray-800">
                    View Attendance History
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
