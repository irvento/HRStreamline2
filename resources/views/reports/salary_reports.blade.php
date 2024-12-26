@extends('reports.index')

@section('content')

<h3 class="text-2xl font-semibold text-white">Salary Reports</h3>
<br><br>
<!-- Search Form -->
<div class="mb-6 flex items-center space-x-4">
    <form method="GET" action="{{ route('rsalary.reports') }}" class="flex space-x-2 w-full max-w-xl">
        <div class="w-full">
            <label for="search" class="block text-sm font-medium text-gray-300">Search</label>
            <input type="text" id="search" name="search" value="{{ request('search') }}" placeholder="Search by Salary ID, Grade, Amount, Frequency"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-800 text-white placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600">
        </div>
        <div class="flex items-end">
            <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Filter
            </button>

           

        </div>
         <div class="flex items-end">
            <button onclick="window.print()" class="px-7 py-0.3  bg-green-500 text-white rounded-md shadow hover:bg-green-600">Print Table</button>    
        </div>       

    </form>
    
</div>

<!-- Salary Reports Table -->
<div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow-lg">
    <table class="min-w-full text-sm text-left text-gray-200">
        <thead class="bg-gray-700">
            <tr>
                <th class="px-6 py-3 text-sm font-medium text-white">Salary ID</th>
                <th class="px-6 py-3 text-sm font-medium text-white">Salary Grade</th>
                <th class="px-6 py-3 text-sm font-medium text-white">Salary Amount</th>
                <th class="px-6 py-3 text-sm font-medium text-white">Payment Frequency</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salaryReports as $salary)
                <tr class="border-b border-gray-700 hover:bg-gray-700">
                    <td class="px-6 py-4 text-white">{{ $salary->salary_id }}</td>
                    <td class="px-6 py-4 text-white">{{ $salary->salary_grade }}</td>
                    <td class="px-6 py-4 text-white">{{ $salary->salary_amount }}</td>
                    <td class="px-6 py-4 text-white">{{ $salary->payment_frequency_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
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
