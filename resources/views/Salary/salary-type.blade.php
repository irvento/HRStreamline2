<div class="overflow-x-auto">
    <table
        class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md rounded-lg">
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Salary ID</th>
                <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Salary Grade</th>
                <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Salary Amount</th>
                <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Payment Frequency</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salaries as $salary)
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <td class="px-4 py-2 text-gray-800 dark:text-gray-300">{{ $salary->salary_id }}</td>
                    <td class="px-4 py-2 text-gray-800 dark:text-gray-300">{{ $salary->salary_grade }}</td>
                    <td class="px-4 py-2 text-gray-800 dark:text-gray-300">{{ $salary->salary_amount }}</td>
                    <td class="px-4 py-2 text-gray-800 dark:text-gray-300">
                        {{ $salary->paymentFrequency ? $salary->paymentFrequency->payment_name : 'N/A' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
