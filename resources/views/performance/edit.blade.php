<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Performance Rating') }}
        </h2>
    </x-slot>

    <div class="w-full mt-8">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-8">
            <form action="{{ route('performance.update', $performance->performance_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="employee_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Employee
                    </label>
                    <select name="employee_id" id="employee_id" required
                        class="w-full px-4 py-2 rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                        @foreach($employees as $employee)
                            <option value="{{ $employee->employee_id }}"
                                {{ $performance->employee_id == $employee->employee_id ? 'selected' : '' }}>
                                {{ $employee->employee_fname }} {{ $employee->employee_lname }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="total_days_present" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Total Days Present
                    </label>
                    <input type="number" name="total_days_present" id="total_days_present" required
                        value="{{ $performance->total_days_present }}"
                        class="w-full px-4 py-2 rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                </div>

                <div class="mb-4">
                    <label for="total_days_absent" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Total Days Absent
                    </label>
                    <input type="number" name="total_days_absent" id="total_days_absent" required
                        value="{{ $performance->total_days_absent }}"
                        class="w-full px-4 py-2 rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                </div>

                <div class="mb-4">
                    <label for="leave_days_taken" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Leave Days Taken
                    </label>
                    <input type="number" name="leave_days_taken" id="leave_days_taken" required
                        value="{{ $performance->leave_days_taken }}"
                        class="w-full px-4 py-2 rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                </div>

                <div class="mb-4">
                    <label for="review_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Review Date
                    </label>
                    <input type="date" name="review_date" id="review_date" required
                        value="{{ $performance->review_date }}"
                        class="w-full px-4 py-2 rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                </div>

                <div class="mb-4">
                    <label for="review_score" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Review Score (0-5)
                    </label>
                    <input type="number" name="review_score" id="review_score" step="0.1" min="0" max="5"
                        value="{{ $performance->review_score }}"
                        class="w-full px-4 py-2 rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-medium text-lg rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Update Performance
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
