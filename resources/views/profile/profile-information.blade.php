<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <style>
        /* Glowing Gradient Background */
        .glowing-gradient {
            background: linear-gradient(
                135deg,
                #ff7eb3,
                #65d6ce
            );
            background-size: 400% 400%;
            animation: gradientAnimation 10s ease infinite;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
    </style>

    <div class="py-12 glowing-gradient min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Profile Card -->
            <div class="p-8 bg-white dark:bg-gray-800 shadow-xl rounded-lg border-4 border-gray-300 dark:border-gray-700 transform hover:scale-105 transition duration-300">
                @if ($employee->employee_id == null)
                    <!-- Add Information Button -->
                    <div class="flex justify-center">
                        <a href="{{ route('employees.create') }}" 
                           class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 shadow-md">
                            Add Information
                        </a>
                    </div>
                @else
                    <!-- Profile Header -->
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-8 text-center">Employee Profile</h1>

                    <!-- Profile Image -->
                    <div class="flex justify-center mb-8">
                        <div class="relative">
                            <img src="{{ asset($employee->image) }}" 
                                 alt="Profile Image" 
                                 class="w-32 h-32 rounded-full object-cover border-4 border-white dark:border-gray-600 shadow-lg">
                            <div class="absolute inset-0 rounded-full border-4 border-gray-300 dark:border-gray-700"></div>
                        </div>
                    </div>

                    <!-- Name Section -->
                    <div class="mb-8 bg-gray-50 dark:bg-gray-900 p-6 rounded-lg border border-gray-200 dark:border-gray-700 shadow-md">
                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-4">Name</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <p class="text-gray-600 dark:text-gray-400">First Name: <span class="font-medium">{{ $employee->first_name }}</span></p>
                            <p class="text-gray-600 dark:text-gray-400">Middle Name: <span class="font-medium">{{ $employee->middle_name }}</span></p>
                            <p class="text-gray-600 dark:text-gray-400">Last Name: <span class="font-medium">{{ $employee->last_name }}</span></p>
                            <p class="col-span-2 text-gray-600 dark:text-gray-400">Full Name: <span class="font-semibold text-gray-800 dark:text-gray-100">{{ $employee->full_name }}</span></p>
                        </div>
                    </div>

                    <!-- Address Section -->
                    <div class="mb-8 bg-gray-50 dark:bg-gray-900 p-6 rounded-lg border border-gray-200 dark:border-gray-700 shadow-md">
                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-4">Address</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <p class="text-gray-600 dark:text-gray-400">Address Line 1: <span class="font-medium">{{ $employee->address_line_1 }}</span></p>
                            <p class="text-gray-600 dark:text-gray-400">Address Line 2: <span class="font-medium">{{ $employee->address_line_2 }}</span></p>
                            <p class="text-gray-600 dark:text-gray-400">City: <span class="font-medium">{{ $employee->city }}</span></p>
                            <p class="text-gray-600 dark:text-gray-400">State: <span class="font-medium">{{ $employee->state }}</span></p>
                            <p class="text-gray-600 dark:text-gray-400">Postal Code: <span class="font-medium">{{ $employee->postal_code }}</span></p>
                            <p class="text-gray-600 dark:text-gray-400">Country: <span class="font-medium">{{ $employee->country }}</span></p>
                            <p class="col-span-2 text-gray-600 dark:text-gray-400">Full Address: <span class="font-semibold text-gray-800 dark:text-gray-100">{{ $employee->full_address }}</span></p>
                        </div>
                    </div>

                    <!-- Contact Information Section -->
                    <div class="mb-8 bg-gray-50 dark:bg-gray-900 p-6 rounded-lg border border-gray-200 dark:border-gray-700 shadow-md">
                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-4">Contact Information</h2>
                        <div class="space-y-2">
                            <p class="text-gray-600 dark:text-gray-400">Email: <span class="font-medium">{{ $employee->employee_email }}</span></p>
                            <p class="text-gray-600 dark:text-gray-400">Contact 1: <span class="font-medium">{{ $employee->contact1 }}</span></p>
                        </div>
                    </div>

                    <!-- Employee ID -->
                    <div class="bg-gray-50 dark:bg-gray-900 p-6 rounded-lg border border-gray-200 dark:border-gray-700 shadow-md">
                        <p class="text-gray-600 dark:text-gray-400">Employee ID: <span class="font-semibold text-gray-800 dark:text-gray-100">{{ $employee->employee_id }}</span></p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
