<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employee Performance Ratings') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <!-- Create Button -->
                <div class="mb-4">
                    <a href="{{ route('performance.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800">
                        Add New Performance Rating
                    </a>
                </div>

                <table class="min-w-full text-left text-sm font-medium text-gray-900 dark:text-gray-100">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Employee Name</th>
                            <th class="px-4 py-2">Review Date</th>
                            <th class="px-4 py-2">Review Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($performance as $rating)
                        <tr>
                            <td class="px-4 py-2">{{ $rating->employee->employee_fname }} {{ $rating->employee->employee_lname }}</td>
                            <td class="px-4 py-2">{{ $rating->review_date }}</td>
                            <td class="px-4 py-2">{{ $rating->review_score }}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
