<x-app-layout>
    @if (Auth::user()->role === 'admin')
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Payroll Management') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <!-- Actions Section -->
        <div class="flex justify-between items-center mb-6">
            <!-- Add Payroll Button -->
            <a href="{{ route('payroll.create') }}" 
                class="inline-flex items-center px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800">
                + Add Payroll
            </a>

            <!-- Search Bar -->
            <form action="{{ route('payroll.index') }}" method="GET" class="flex items-center">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search by name, status, or period" 
                    class="w-64 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                >
                <button 
                    type="submit" 
                    class="ml-2 px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    Search
                </button>
            </form>
        </div>

        <!-- Payroll Records Table -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            @if ($payrolls->isNotEmpty())
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                    <tr>
                        <th class="px-6 py-4 font-medium">Payroll ID</th> <!-- New Column -->
                        <th class="px-6 py-4 font-medium">Employee Name</th>
                        <th class="px-6 py-4 font-medium">Payroll Status</th>
                        <th class="px-6 py-4 font-medium">Pay Period</th>
                        <th class="px-6 py-4 font-medium">Payment Date</th>
                        <th class="px-6 py-4 text-center font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($payrolls as $payroll)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-6 py-4">{{ $payroll->payroll_id }}</td> <!-- New Column -->
                            <td class="px-6 py-4">{{ $payroll->employee_fname }} {{ $payroll->employee_lname }}</td>
                            <td class="px-6 py-4">{{ $payroll->payroll_status }}</td>
                            <td class="px-6 py-4">{{ $payroll->pay_period }}</td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($payroll->payment_date)->format('M d, Y') }}</td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center space-x-4">
                                    <a href="{{ route('payroll.edit', $payroll->payroll_id) }}" 
                                        class="text-yellow-500 hover:text-yellow-600">
                                        Edit
                                    </a>
                                    <form action="{{ route('payroll.delete', $payroll->payroll_id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            class="text-red-500 hover:text-red-600"
                                            onclick="return confirm('Are you sure you want to delete this payroll?')">
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
                    No payroll records found.
                </div>
            @endif
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            {{ $payrolls->links('pagination::tailwind') }}
        </div>
    </div>
    @endif


    @if (Auth::user()->role === 'user')
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Payroll') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <!-- Actions Section -->
        <div class="flex justify-between items-center mb-6">


            <!-- Search Bar -->
            <form action="{{ route('payroll.index') }}" method="GET" class="flex items-center">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search by name, status, or period" 
                    class="w-64 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                >
                <button 
                    type="submit" 
                    class="ml-2 px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    Search
                </button>
            </form>
        </div>

        <!-- Payroll Records Table -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            @if ($payrolluser->isNotEmpty())
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                    <tr>
                        <th class="px-6 py-4 font-medium">Payroll ID</th> <!-- New Column -->
                        <th class="px-6 py-4 font-medium">Employee Name</th>
                        <th class="px-6 py-4 font-medium">Payroll Status</th>
                        <th class="px-6 py-4 font-medium">Pay Period</th>
                        <th class="px-6 py-4 font-medium">Payment Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($payrolluser as $payroll)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-6 py-4">{{ $payroll->payroll_id }}</td> <!-- New Column -->
                            <td class="px-6 py-4">{{ $payroll->employee_fname }} {{ $payroll->employee_lname }}</td>
                            <td class="px-6 py-4">{{ $payroll->payroll_status }}</td>
                            <td class="px-6 py-4">{{ $payroll->pay_period }}</td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($payroll->payment_date)->format('M d, Y') }}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <div class="p-6 text-center text-gray-500 dark:text-gray-400">
                    No payroll records found.
                </div>
            @endif
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            {{ $payrolls->links('pagination::tailwind') }}
        </div>
    </div>
    @endif
</x-app-layout>
