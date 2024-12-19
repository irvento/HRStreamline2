<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Payroll') }}
        </h2>
    </x-slot>

    <div class="p-6 bg-gray-50 dark:bg-gray-900 rounded-lg shadow-md">
        <form action="{{ route('payroll.update', $payroll->payroll_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="employee_id" class="block text-gray-700 dark:text-gray-300">Select Employee</label>
                <select id="employee_id" name="employee_id" class="w-full p-2 border rounded-md dark:bg-gray-800 dark:text-gray-300" required>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->employee_id }}" {{ $payroll->employee_id == $employee->employee_id ? 'selected' : '' }}>
                            {{ $employee->employee_fname }} {{ $employee->employee_lname }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="payroll_status" class="block text-gray-700 dark:text-gray-300">Payroll Status</label>
                <select id="payroll_status" name="payroll_status" class="w-full p-2 border rounded-md dark:bg-gray-800 dark:text-gray-300" required>
                    <option value="Pending" {{ $payroll->payroll_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ $payroll->payroll_status == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Cancelled" {{ $payroll->payroll_status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="pay_period" class="block text-gray-700 dark:text-gray-300">Pay Period</label>
                <input type="date" id="pay_period" name="pay_period" value="{{ $payroll->pay_period }}" class="w-full p-2 border rounded-md dark:bg-gray-800 dark:text-gray-300" required>
            </div>

            <div class="mb-4">
                <label for="payment_date" class="block text-gray-700 dark:text-gray-300">Payment Date</label>
                <input type="date" id="payment_date" name="payment_date" value="{{ $payroll->payment_date }}" class="w-full p-2 border rounded-md dark:bg-gray-800 dark:text-gray-300" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded-md hover:bg-blue-700 transition duration-300">Update Payroll</button>
        </form>
    </div>
</x-app-layout>
