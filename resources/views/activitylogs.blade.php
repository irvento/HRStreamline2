<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Activity Logs') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <!-- Search Section -->
        <div class="flex justify-between items-center mb-6">
            <form action="{{ route('activitylog.index') }}" method="GET" class="flex items-center space-x-4">
                <!-- Search by ID, User, Table, or Action -->
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search by ID, User, Table, or Action" 
                    class="w-64 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                >

                <!-- Date Range Filters -->
                <input 
                    type="date" 
                    name="start_date" 
                    value="{{ request('start_date') }}" 
                    class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                >
                <span class="text-gray-600 dark:text-gray-300">to</span>
                <input 
                    type="date" 
                    name="end_date" 
                    value="{{ request('end_date') }}" 
                    class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                >

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="ml-2 px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    Search
                </button>
            </form>
        </div>

        <!-- Activity Log Table -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            @if ($activitylog->isNotEmpty())
                <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                        <tr>
                            <th class="px-6 py-4 font-medium">ID</th>
                            <th class="px-6 py-4 font-medium">User ID</th>
                            <th class="px-6 py-4 font-medium">Table Name</th>
                            <th class="px-6 py-4 font-medium">Row ID</th>
                            <th class="px-6 py-4 font-medium">Action</th>
                            <th class="px-6 py-4 font-medium">Created At</th>
                            <th class="px-6 py-4 font-medium">Updated At</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($activitylog as $log)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-6 py-4">{{ $log->id }}</td>
                                <td class="px-6 py-4">{{ $log->user_id }}</td>
                                <td class="px-6 py-4">{{ $log->table_name }}</td>
                                <td class="px-6 py-4">{{ $log->row_id }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-sm font-semibold rounded-full 
                                        @if ($log->action === 'Created') bg-green-100 text-green-800 
                                        @elseif ($log->action === 'Updated') bg-blue-100 text-blue-800 
                                        @elseif ($log->action === 'Deleted') bg-red-100 text-red-800 
                                        @endif">
                                        {{ $log->action }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($log->created_at)->format('M d, Y H:i') }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($log->updated_at)->format('M d, Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="p-6 text-center text-gray-500 dark:text-gray-400">
                    No activity logs found.
                </div>
            @endif
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            {{ $activitylog->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>
