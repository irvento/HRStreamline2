<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-300 leading-tight">
            {{ __('Add New Job') }}
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
                <form action="{{ route('jobs.store') }}" method="POST">
                    @csrf

                    <!-- Job Title -->
                    <div class="mb-6">
                        <label for="job_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Job Title</label>
                        <input type="text" name="job_title" id="job_title" required class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- Job Description -->
                    <div class="mb-6">
                        <label for="job_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                        <textarea name="job_description" id="job_description" rows="4" class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>

                    <!-- Salary -->
                    <div class="mb-6">
                        <label for="salary_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Salary</label>
                        <select name="salary_id" id="salary_id" required class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @foreach($salaries as $salary)
                                <option value="{{ $salary->salary_grade }}">{{ $salary->salary_amount }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-8">
                        <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Save Job
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
