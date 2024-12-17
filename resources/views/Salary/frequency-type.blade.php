<div class="overflow-x-auto">
    <table
        class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md rounded-lg">
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Payment Frequency ID</th>
                <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Payment Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paymentFrequencies as $paymentFrequency)
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <td class="px-4 py-2 text-gray-800 dark:text-gray-300">{{ $paymentFrequency->payment_frequency_id }}</td>
                    <td class="px-4 py-2 text-gray-800 dark:text-gray-300">{{ $paymentFrequency->payment_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
