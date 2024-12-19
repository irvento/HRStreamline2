@extends('reports.index')

@section('content')

<h3 class="text-2xl font-semibold text-white">Leaves Records</h3>
<br><br>

<div class="mb-4 flex items-center space-x-4">
    <form method="GET" action="{{ route('rleaves') }}" class="flex space-x-2">
        <div>
            <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Search</label>
            <input type="text" id="search" name="search" value="{{ request('search') }}" placeholder="Search by Employee ID"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:border-gray-600">
        </div>
        <div class="flex items-end">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600">
                Filter
            </button>
        </div>
    </form>
</div>

<table class="w-full bg-white dark:bg-gray-800 rounded-lg shadow-lg">
    <thead class="bg-gray-200 dark:bg-gray-700">
        <tr>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-800 dark:text-gray-200">Leave
                ID</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-800 dark:text-gray-200">
                Employee ID</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-800 dark:text-gray-200">Start
                Date</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-800 dark:text-gray-200">End
                Date</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-800 dark:text-gray-200">Status
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($leaves as $leave)
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $leave->leave_id }}</td>
                <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $leave->employee_id }}</td>
                <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $leave->start_date }}</td>
                <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $leave->end_date }}</td>
                <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $leave->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection