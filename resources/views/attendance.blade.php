<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Attendance Management') }}
        </h2>
    </x-slot>

    <div class="mt-8">
        @if(session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('attendance.login') }}" class="mb-4">
            @csrf
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                Log In (Clock In)
            </button>
        </form>

        <form method="POST" action="{{ route('attendance.logout') }}">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">
                Log Out (Clock Out)
            </button>
        </form>

        <a href="{{ route('attendance.history') }}" class="text-white mt-4 inline-block">
            View Attendance History
        </a>
    </div>
</x-app-layout>
