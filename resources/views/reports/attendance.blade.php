@extends('reports.index')

@section('content')
    <h3 class="text-2xl font-semibold text-white">Attendance Records</h3>
    <br><br>

<div class="mb-4 flex items-center space-x-4">
    <form method="GET" action="{{ route('rattendance') }}" class="flex space-x-2">
        <div>
            <label for="start_date" class="block text-sm font-medium text-white">Start Date</label>
            <input type="date" id="start_date" name="start_date" value="{{ request('start_date') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:border-gray-600 text-white">
        </div>
        <div>
            <label for="end_date" class="block text-sm font-medium text-white ">End Date</label>
            <input type="date" id="end_date" name="end_date" value="{{ request('end_date') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:border-gray-600 text-white">
        </div>
        <div>
            <label for="search" class="block text-sm font-medium text-white">Search</label>
            <input type="text" id="search" name="search" value="{{ request('search') }}" placeholder="Search by Employee ID" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:border-gray-600 text-white">
        </div>
        <div class="flex items-end">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600">Filter</button>
        </div>
        
        <div class="flex items-end">
            <button onclick="window.print()" class="px-4 py-2 bg-green-500 text-white rounded-md shadow hover:bg-green-600">Print Table</button>
        </div>
    </form>
</div>

<table class="w-full bg-white dark:bg-gray-800 rounded-lg shadow-lg">
    <thead class="bg-gray-200 dark:bg-gray-700">
        <tr>
            <th class="px-4 py-2 text-left text-sm font-medium text-white">Attendance ID</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-white">Employee ID</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-white">Employee Name</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-white">Date</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-white">Time In</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-white">Time Out</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($attendance as $attendances)
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <td class="px-4 py-2 text-white">{{ $attendances->attendance_id }}</td>
                <td class="px-4 py-2 text-white">{{ $attendances->employee_id }}</td>
                <td class="px-4 py-2 text-white">
                    {{ $attendances->employee->employee_fname }} {{ $attendances->employee->employee_mname }}
                    {{ $attendances->employee->employee_lname }}
                </td>
                <td class="px-4 py-2 text-white">{{ $attendances->attendance_date }}</td>
                <td class="px-4 py-2 text-white">{{ $attendances->time_in }}</td>
                <td class="px-4 py-2 text-white">{{ $attendances->time_out }}</td>
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

        .fas.fa-calendar-alt {
            font-size: 18px; /* Adjust the size of the icon */
            color: white; /* Set the icon color to white */
        }
    }
</style>
@endsection
