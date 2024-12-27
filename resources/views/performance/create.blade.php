<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rate Employee Performance') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <!-- Back Button -->
        <div class="mb-4">
            <a href="{{ url()->previous() }}"
                class="inline-flex items-center px-4 py-2 bg-gray-600 text-white font-medium rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-offset-gray-800">
                Back
            </a>
        </div>   

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <form action="{{ route('performance.store') }}" method="POST">
                    @csrf

                    <!-- Select Employee to Rate -->
                    <div class="mt-4">
                        <label for="employee_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Select Employee</label>
                        <div class="relative">
                            <select name="employee_id" id="employee_id" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="" disabled selected>Select Employee</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->employee_id }}">
                                        {{ $employee->employee_fname }} {{ $employee->employee_lname }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Total Days Present -->
                    <div class="mt-4">
                        <label for="total_days_present" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Total Days Present</label>
                        <input type="number" name="total_days_present" id="total_days_present" required
                            class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                    </div>

                    <!-- Total Days Absent -->
                    <div class="mt-4">
                        <label for="total_days_absent" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Total Days Absent</label>
                        <input type="number" name="total_days_absent" id="total_days_absent" required
                            class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                    </div>

                    <!-- Leave Days Taken -->
                    <div class="mt-4">
                        <label for="leave_days_taken" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Leave Days Taken</label>
                        <input type="number" name="leave_days_taken" id="leave_days_taken" required
                            class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                    </div>

                    <!-- Review Date -->
                    <div class="mt-4">
                        <label for="review_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Review Date</label>
                        <input type="date" name="review_date" id="review_date" required
                            class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                    </div>

                    <!-- Review Score -->
                    <div class="mt-4">
                        <label for="review_score" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Review Score (0-5)</label>
                        <input type="number" name="review_score" id="review_score" min="0" max="5" step="0.01" 
                            class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button type="submit"
                            class="w-full px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Submit Rating
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
