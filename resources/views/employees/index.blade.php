<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-700 dark:text-gray-200 leading-tight">
            {{ __('Employee Information') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900 min-h-screen">
        <!-- Back Button -->
        <div class="mb-4">
            <a href="{{ url()->previous() }}"
                class="inline-flex items-center px-4 py-2 bg-gray-600 text-white font-medium rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-offset-gray-800">
                Back
            </a>
        </div>   
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Success Message -->
            @if (session('success'))
                <div class="bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg text-center transition-transform transform hover:scale-105">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Employee Profile Card -->
            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg overflow-hidden">
                <!-- Header Section -->
                <div class="p-8 bg-gray-50 dark:bg-gray-700 profile-header">
                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <img src="{{ asset($employeess->image) }}" alt="Profile Image" class="w-16 h-16 rounded-full"
                            class="w-28 h-28 rounded-full object-cover border-4 border-gray-300 dark:border-gray-600 shadow-lg transform hover:scale-105 transition"
                        >
                        <div class="text-center md:text-left">
                            <h3 class="text-3xl font-bold text-gray-800 dark:text-gray-100">
                                {{ $employeess->employee_fname }} {{ $employeess->employee_lname }}
                            </h3>
                            <p class="text-lg text-gray-800 dark:text-gray-100">
                                {{ $employee->job_title ?? 'Position not available' }}
                            </p>
                            <p class="text-sm text-gray-800 dark:text-gray-300">
                                {{ $employee->department_name ?? 'No department assigned' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Information Sections -->
                <div class="p-8 space-y-8">
                    <!-- General Information -->
                    <div>
                        <h4 class="flex items-center gap-2 text-lg font-semibold text-gray-700 dark:text-gray-200 border-b pb-2 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 2a6 6 0 00-6 6v2a4 4 0 00-1 3v1h14v-1a4 4 0 00-1-3V8a6 6 0 00-6-6z" />
                                <path d="M4 15a2 2 0 104 0H4z" />
                            </svg>
                            General Information
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-600 dark:text-gray-400">
                            <p><strong>User ID:</strong> {{ $employeess->user_id }}</p>
                            <p><strong>Employee ID:</strong> {{ $employeess->employee_id }}</p>
                            <p><strong>Full Name:</strong> {{ $employee->full_name ?? 'Not assigned'}} </p>
                            <p><strong>Department:</strong> {{ $employee->department_name ?? 'Not assigned' }}</p>
                            <p><strong>Job Title:</strong> {{ $employee->job_title ?? 'Not available' }}</p>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div>
                        <h4 class="flex items-center gap-2 text-lg font-semibold text-gray-700 dark:text-gray-200 border-b pb-2 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9l7.997-3.116A2 2 0 0016 3H4a2 2 0 00-1.997 2.884z" />
                                <path d="M18 8l-8 3-8-3v6a2 2 0 002 2h12a2 2 0 002-2V8z" />
                            </svg>
                            Contact Information
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-600 dark:text-gray-400">
                            <p><strong>Email:</strong> {{ $employeess->employee_email ?? 'Email not available' }}</p>
                            <p><strong>Phone:</strong> {{ $employeess->contact1 ?? 'Phone number not available' }}</p>
                        </div>
                    </div>

                    <!-- Address Information -->
                    <div>
                        <h4 class="flex items-center gap-2 text-lg font-semibold text-gray-700 dark:text-gray-200 border-b pb-2 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-11a1 1 0 112 0v4a1 1 0 11-2 0V7zm1 6a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                            </svg>
                            Address
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-600 dark:text-gray-400">
                            <p><strong>Address Line 1:</strong> {{ $employeess->address_line_1 ?? 'Not available' }}</p>
                            <p><strong>Address Line 2:</strong> {{ $employeess->address_line_2 ?? 'Not available' }}</p>
                            <p><strong>City:</strong> {{ $employeess->city ?? 'Not available' }}</p>
                            <p><strong>State:</strong> {{ $employeess->state ?? 'Not available' }}</p>
                            <p><strong>Postal Code:</strong> {{ $employeess->postal_code ?? 'Not available' }}</p>
                            <p><strong>Country:</strong> {{ $employeess->country ?? 'Not available' }}</p>
                        </div>
                    </div>

                    <!-- Salary and Performance Information -->
                    <div>
                        <h4 class="flex items-center gap-2 text-lg font-semibold text-gray-700 dark:text-gray-200 border-b pb-2 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm-1 11a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0zM9 8a1 1 0 011-1h4a1 1 0 110 2h-4a1 1 0 01-1-1z" />
                            </svg>
                            Salary and Performance
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-600 dark:text-gray-400">
                            <p><strong>Salary ID:</strong> {{ $employee->salary_id ?? 'Not available' }}</p>
                            <p><strong>Performance Review Score:</strong> {{ $employee->review_score ?? 'Not available' }}</p>
                            <p><strong>Review Date:</strong> {{ $employee->review_date ?? 'Not available' }}</p>
                            <p><strong>Reviewer ID:</strong> {{ $employee->reviewer_id ?? 'Not available' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to generate a random very dark color
            function getRandomVeryDarkColor() {
                const r = Math.floor(Math.random() * 50); // Random value between 0 and 50 for a very dark color
                const g = Math.floor(Math.random() * 50);
                const b = Math.floor(Math.random() * 50);
                return `rgb(${r}, ${g}, ${b})`;
            }
    
            // Function to generate a random light color (lighter than the dark one)
            function getRandomLightColor() {
                const r = Math.floor(Math.random() * 155) + 100; // Random value between 100 and 255 for a light color
                const g = Math.floor(Math.random() * 155) + 100;
                const b = Math.floor(Math.random() * 155) + 100;
                return `rgb(${r}, ${g}, ${b})`;
            }
    
            // Generate one random very dark color for the left side
            const randomDarkColor = getRandomVeryDarkColor();
            // Generate one random light color for the right side
            const randomLightColor = getRandomLightColor();
    
            // Apply the gradient background to the profile header
            const profileHeader = document.querySelector('.profile-header');
            if (profileHeader) {
                profileHeader.style.background = `linear-gradient(to right, ${randomDarkColor}, ${randomLightColor})`;
            }
        });
    </script>
</x-app-layout>
