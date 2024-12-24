<x-app-layout> 
        <x-slot name="header">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Payroll') }}
            </h2>
        </x-slot>

        <div class="py-8">
            
            <div class="flex justify-between items-center mb-6">
                <form action="{{ route('payroll.index') }}" method="GET" class="flex items-center">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name, status, or period" class="w-64 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                    <button type="submit" class="ml-2 px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Search</button>
                </form>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                @if ($payrollusers->isNotEmpty())
                <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                            <tr>
                                <th class="px-6 py-4 font-medium">Payroll ID</th>
                                <th class="px-6 py-4 font-medium">Employee Name</th>
                                <th class="px-6 py-4 font-medium">Payroll Status</th>
                                <th class="px-6 py-4 font-medium">Pay Period</th>
                                <th class="px-6 py-4 font-medium">Payment Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($payrollusers as $payroll)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4">{{ $payroll->payroll_id }}</td>
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
                {{ $payrollusers->links('pagination::tailwind') }}
            </div>
        </div>
</x-app-layout>
