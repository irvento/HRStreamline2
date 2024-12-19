<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employee Information') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Display Success Message -->
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Employee Information Card -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 space-y-4">
                <!-- Employee Name -->
                <div class="flex items-center gap-4">
                    <img src="{{ $employee->image }}" alt="{{ $employee->employee_fname }} {{ $employee->employee_lname }}" class="w-16 h-16 rounded-full object-cover border-2 border-gray-300 dark:border-gray-700">
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">{{ $employee->employee_fname }} {{ $employee->employee_lname }}</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">{{ $employee->position ?? 'Position not available' }}</p>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="space-y-2">
                    <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Contact Information</h4>
                    <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                        <i class="bi bi-telephone text-primary-500"></i>
                        <p>{{ $employee->contact1 }}</p>
                    </div>
                    <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                        <i class="bi bi-envelope text-primary-500"></i>
                        <p>{{ $employee->email ?? 'Email not available' }}</p>
                    </div>
                </div>

                <!-- Address Info (Optional) -->
                @if ($employee->address)
                    <div class="space-y-2">
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Address</h4>
                        <p class="text-gray-600 dark:text-gray-400">{{ $employee->address }}</p>
                    </div>
                @endif

                <!-- Add More Fields As Necessary -->
                <div class="space-y-2">
                    <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Additional Info</h4>
                    <p class="text-gray-600 dark:text-gray-400">{{ $employee->additional_info ?? 'No additional information available.' }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
