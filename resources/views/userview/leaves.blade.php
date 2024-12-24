<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Leave Management') }}
        </h2>
    </x-slot>
    
    <div class="py-8">
        <!-- Actions Section -->
        <div class="flex justify-between items-center mb-6">
                <!-- Add Leave Button -->
                <a href="{{ route('leaves.create') }}" 
                    class="inline-flex items-center px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800">
                    + Add Leave
                </a>
            </div>
    

        <!-- Leave Table -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            @if ($leaves->count() > 0)
                <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                        <tr>
                            <th class="px-6 py-4 font-medium">Leave ID</th>
                            <th class="px-6 py-4 font-medium">Employee ID</th>
                            <th class="px-6 py-4 font-medium">Start Date</th>
                            <th class="px-6 py-4 font-medium">End Date</th>
                            <th class="px-6 py-4 font-medium">Status</th>
                            <th class="px-6 py-4 text-center font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($leavesuser as $leave)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-6 py-4">{{ $leave->leave_id }}</td>
                                <td class="px-6 py-4">{{ $leave->employee_id }}</td>
                                <td class="px-6 py-4">{{ $leave->start_date }}</td>
                                <td class="px-6 py-4">{{ $leave->end_date }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-block px-3 py-1 rounded-full text-sm font-medium text-white 
                                        {{ $leave->leave_status == 'Approved' ? 'bg-green-500' : ($leave->leave_status == 'Pending' ? 'bg-yellow-500' : 'bg-red-500') }}">
                                        {{ $leave->leave_status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center space-x-4">
                                        <a href="{{ route('leaves.edit', $leave->leave_id) }}" 
                                            class="text-yellow-500 hover:text-yellow-600">
                                            Edit
                                        </a>
                                        <form action="{{ route('leaves.destroy', $leave->leave_id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                class="text-red-500 hover:text-red-600"
                                                onclick="return confirm('Are you sure you want to delete this leave?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="p-6 text-center text-gray-500 dark:text-gray-400">
                    No leave records found.
                </div>
            @endif
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            {{ $leaves->links('pagination::tailwind') }}
        </div>
    </div>

</x-app-layout>
