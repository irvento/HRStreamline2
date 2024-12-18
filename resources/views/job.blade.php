<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-300 leading-tight">
            {{ __('Job Management') }}
        </h2>
    </x-slot>

    <div class="w-full mt-8">
        <div class="w-full mt-8 mb-4">
            <div class="bg-gray-800 shadow-md rounded-lg p-6">
                <!-- Header with Search and Add Button -->
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium text-gray-300">Jobs List</h3>
                    <div class="flex space-x-4">
                        <!-- Search Form -->
                        <form action="{{ route('job.index') }}" method="GET" class="flex items-center space-x-2">
                            <input type="text" name="search" value="{{ request('search') }}" 
                                class="px-4 py-2 text-sm rounded-md border border-gray-600 bg-gray-700 text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Search jobs..." />
                            <button type="submit" 
                                class="px-4 py-2 bg-blue-600 text-gray-100 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Search
                            </button>
                        </form>

                        <!-- Add New Job Button -->
                        <a href="{{ route('jobs.create') }}" 
                            class="px-4 py-2 bg-blue-600 text-gray-100 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Add New Job
                        </a>
                    </div>
                </div>

                <!-- Job Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-700 rounded-lg shadow-sm">
                        <thead class="bg-gray-700">
                            <tr>
                                <th class="px-4 py-2 text-left text-gray-300 font-medium border-b border-gray-600">Job Title</th>
                                <th class="px-4 py-2 text-left text-gray-300 font-medium border-b border-gray-600">Description</th>
                                <th class="px-4 py-2 text-left text-gray-300 font-medium border-b border-gray-600">Salary</th>
                                <th class="px-4 py-2 text-left text-gray-300 font-medium border-b border-gray-600">Salary Grade</th>
                                <th class="px-4 py-2 text-left text-gray-300 font-medium border-b border-gray-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jobs as $job)
                                <tr class="hover:bg-gray-700">
                                    <td class="px-4 py-2 border-b border-gray-600 text-gray-300">{{ $job->job_title }}</td>
                                    <td class="px-4 py-2 border-b border-gray-600 text-gray-400">{{ $job->job_description }}</td>
                                    <td class="px-4 py-2 border-b border-gray-600 text-gray-300">{{ $job->salary->salary_amount ?? 'N/A' }}</td>
                                    <td class="px-4 py-2 border-b border-gray-600 text-gray-300">{{ $job->salary->salary_grade ?? 'N/A' }}</td>
                                    <td class="px-4 py-2 border-b border-gray-600">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('jobs.edit', $job->job_id) }}" 
                                                class="px-3 py-1 bg-yellow-500 text-gray-100 rounded-md hover:bg-yellow-600 focus:outline-none">
                                                Edit
                                            </a>
                                            <form action="{{ route('jobs.destroy', $job->job_id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                    class="px-3 py-1 bg-red-600 text-gray-100 rounded-md hover:bg-red-700 focus:outline-none"
                                                    onclick="return confirm('Are you sure you want to delete this job?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-4 text-center text-gray-500">
                                        No jobs found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $jobs->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
