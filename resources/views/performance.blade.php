<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employee Performance Ratings') }}
        </h2>
    </x-slot>

        <div class=" w-full mt-8 ">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-8">
                <!-- Search and Add Button Section -->
                <div class="mb-6 flex justify-between items-center">
                    <!-- Search Form -->
                    <form method="GET" action="{{ route('performance.index') }}" class="flex items-center w-full max-w-md">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..."
                            class="w-full px-4 py-2 rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                        <button type="submit"
                            class="ml-2 px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Search
                        </button>
                    </form>

                    <!-- Add Button -->
                    <a href="{{ route('performance.create') }}"
                        class="ml-4 inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium text-lg rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800">
                        Add New Performance Rating
                    </a>
                </div>

                <!-- Performance Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-base font-medium text-gray-900 dark:text-gray-100">
                        <thead>
                            <tr class="border-b border-gray-300 dark:border-gray-600">
                                <th class="px-6 py-3">Performance ID</th>
                                <th class="px-6 py-3">Employee Name</th>
                                <th class="px-6 py-3">Review Date</th>
                                <th class="px-6 py-3">Review Score</th>
                                <th class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($performance as $rating)
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">{{ $rating->performance_id }}</td>
                                <td class="px-6 py-4">
                                    @if($rating->employee)
                                        {{ $rating->employee->employee_fname }} {{ $rating->employee->employee_lname }}
                                    @else
                                        <span class="text-gray-500">No Employee Data</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">{{ $rating->review_date }}</td>
                                <td class="px-6 py-4">{{ $rating->review_score }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('performance.edit', $rating->performance_id) }}"
                                            class="px-3 py-1 bg-yellow-500 text-gray-100 rounded-md hover:bg-yellow-600 focus:outline-none">
                                            Edit
                                        </a>
                                        <form action="{{ route('performance.destroy', $rating->performance_id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-600 text-gray-100 rounded-md hover:bg-red-700 focus:outline-none"
                                                onclick="return confirm('Are you sure you want to delete this performance rating?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                    No results found.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $performance->appends(['search' => request('search')])->links() }}
                </div>
            </div>
        </div>

</x-app-layout>
