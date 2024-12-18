<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-300 leading-tight">
            {{ __('Add Employee Info') }}
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
                <form action="{{ route('employee_info.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="mb-6">
                            <label for="employee_id" class="block text-sm font-medium text-gray-300">Employee</label>
                            <select name="employee_id" id="employee_id" class="w-full mt-1 rounded-lg border-gray-300 dark:bg-gray-700 dark:text-gray-300">
                                <option value="">Select an Employee</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->employee_id }}" {{ old('employee_id', $employeeInfo->employee_id ?? '') == $employee->employee_id ? 'selected' : '' }}>
                                        {{ $employee->employee_fname }}
                                    </option>
                                @endforeach
                            </select>
                            @error('employee_id')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="department_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Department</label>
                            <select name="department_id" id="department_id" class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600 rounded-md">
                                @foreach($departments as $department)
                                    <option value="{{ $department->department_id }}">{{ $department->department_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="job_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Job</label>
                            <select name="job_id" id="job_id" class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600 rounded-md">
                                @foreach($jobs as $job)
                                    <option value="{{ $job->job_id }}">{{ $job->job_title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="performance_id" class="block text-sm font-medium text-gray-300">Performance</label>
                            <select name="performance_id" id="performance_id" class="w-full mt-1 rounded-lg border-gray-300 dark:bg-gray-700 dark:text-gray-300">
                                <option value="">No Performance Assigned</option>
                                @foreach($performances as $performance)
                                    <option value="{{ $performance->performance_id }}" {{ old('performance_id', $employeeInfo->performance_id ?? '') == $performance->performance_id ? 'selected' : '' }}>
                                        {{ $performance->performance_id }}
                                    </option>
                                @endforeach
                            </select>
                            @error('performance_id')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-8">
                        <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Add Employee Info
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
