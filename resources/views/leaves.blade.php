<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight text-lg font-semibold text-gray-800 dark:text-gray-200">
            {{ __('Leave Management') }}
        </h2>
    </x-slot>

    <div class="mt-8">
        <a href="{{ route('leaves.create') }}" 
           class="mb-4 px-6 py-2 bg-primary-500 text-white rounded-lg hover:bg-primary-600 transition text-lg font-semibold text-gray-800 dark:text-gray-200">
           Add Leave
        </a>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md mt-4 text-lg font-semibold text-gray-800 dark:text-gray-200">
            @if ($leaves->count() > 0)
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th>Leave ID</th>
                            <th>Employee ID</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leaves as $leave)
                            <tr>
                                <td>{{ $leave->leave_id }}</td>
                                <td>{{ $leave->employee_id }}</td>
                                <td>{{ $leave->start_date }}</td>
                                <td>{{ $leave->end_date }}</td>
                                <td>{{ $leave->leave_status }}</td>
                                <td>

                                    <a href="{{ route('leaves.edit', $leave->leave_id) }}" class="text-yellow-500">Edit</a> |
                                    <form action="{{ route('leaves.destroy', $leave->leave_id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No leaves found.</p>
            @endif
        </div>

        <div class="mt-4">
            {{ $leaves->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>
