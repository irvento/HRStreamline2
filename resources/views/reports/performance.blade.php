@extends('reports.index')

@section('content')
<h3 class="text-2xl font-semibold text-white">Performance Records</h3>
<br><br>

<div class="mb-4 flex items-center space-x-4">
    <!-- Search Form -->
    <form method="GET" action="{{ route('rperformance') }}" class="flex space-x-2">
        <div>
            <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Search</label>
            <input type="text" id="search" name="search" value="{{ request('search') }}" placeholder="Search by Performance ID, Employee ID, etc."
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:border-gray-600">
        </div>
        <div class="flex items-end">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600">
                Filter
            </button>
        </div>
    </form>
    <div class="flex items-end mt-6">
        <button onclick="window.print()" class="px-4 py-2 bg-green-500 text-white rounded-md shadow hover:bg-green-600">Print Table</button>
    </div>
</div>

<!-- Performance Records Table -->
<table class="w-full bg-white dark:bg-gray-800 rounded-lg shadow-lg">
    <thead class="bg-gray-200 dark:bg-gray-700">
        <tr>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-800 dark:text-gray-200">Performance ID</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-800 dark:text-gray-200">Employee ID</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-800 dark:text-gray-200">Total Days Present</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-800 dark:text-gray-200">Total Days Absent</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-800 dark:text-gray-200">Leave Days Taken</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-800 dark:text-gray-200">Review Date</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-800 dark:text-gray-200">Review Score</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-800 dark:text-gray-200">Reviewer ID</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($performance as $record)
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $record->performance_id }}</td>
                <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $record->employee_id }}</td>
                <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $record->total_days_present }}</td>
                <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $record->total_days_absent }}</td>
                <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $record->leave_days_taken }}</td>
                <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $record->review_date }}</td>
                <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $record->review_score }}</td>
                <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $record->reviewer_id }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<style>
@media print {
    /* Hide everything except the table */
    body * {
        visibility: hidden;
    }

    /* Make the table and its contents visible */
    table, table * {
        visibility: visible;
    }

    /* Position the table for printing */
    table {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        border-collapse: collapse; /* Ensure borders are neat */
    }

    /* Add styling for headers */
    th {
        background-color: #f2f2f2; /* Light gray background for headers */
        color: black; /* Text color */
        font-weight: bold;
        border: 1px solid #ddd; /* Header borders */
        padding: 8px;
    }

    /* Add styling for table rows */
    td {
        border: 1px solid #ddd; /* Row borders */
        padding: 8px;
        color: black;
    }

    /* Remove background colors for print */
    table {
        background: none !important;
    }

    /* Ensure white background for table in case of dark mode */
    table {
        background-color: white !important;
    }
}

</style>
@endsection
