<div class="overflow-x-auto">
    <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md rounded-lg">
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Salary ID</th>
                <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Salary Grade</th>
                <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Salary Amount</th>
                <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Payment Frequency Type</th>
                <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Rows for Design -->
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <td class="px-4 py-2 text-gray-800 dark:text-gray-300">001</td>
                <td class="px-4 py-2 text-gray-800 dark:text-gray-300">A</td>
                <td class="px-4 py-2 text-gray-800 dark:text-gray-300">$50,000</td>
                <td class="px-4 py-2 text-gray-800 dark:text-gray-300">Monthly</td>
                <td class="px-4 py-2 text-gray-800 dark:text-gray-300">
                    <div class="flex items-center gap-4">
                        <a href="#" class="px-4 py-2 text-sm text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 transition">
                            <i class="bi bi-eye"></i> View
                        </a>
                        <a href="#" class="px-4 py-2 text-sm text-white bg-green-500 rounded-lg hover:bg-green-600 transition">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <button class="px-4 py-2 text-sm text-white bg-red-500 rounded-lg hover:bg-red-600 transition">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </div>
                </td>
            </tr>
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <td class="px-4 py-2 text-gray-800 dark:text-gray-300">002</td>
                <td class="px-4 py-2 text-gray-800 dark:text-gray-300">B</td>
                <td class="px-4 py-2 text-gray-800 dark:text-gray-300">$60,000</td>
                <td class="px-4 py-2 text-gray-800 dark:text-gray-300">Bi-Weekly</td>
                <td class="px-4 py-2 text-gray-800 dark:text-gray-300">
                    <div class="flex items-center gap-4">
                        <a href="#" class="px-4 py-2 text-sm text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 transition">
                            <i class="bi bi-eye"></i> View
                        </a>
                        <a href="#" class="px-4 py-2 text-sm text-white bg-green-500 rounded-lg hover:bg-green-600 transition">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <button class="px-4 py-2 text-sm text-white bg-red-500 rounded-lg hover:bg-red-600 transition">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Modal for Delete Confirmation -->
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
        <div class="w-full max-w-sm p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Confirm Deletion</h2>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Are you sure you want to delete this record? This action cannot be undone.</p>
            <div class="flex justify-end gap-4">
                <button class="px-4 py-2 text-sm text-gray-800 bg-gray-200 rounded-lg hover:bg-gray-300 transition">
                    Cancel
                </button>
                <button class="px-4 py-2 text-sm text-white bg-red-500 rounded-lg hover:bg-red-600 transition">
                    Confirm Delete
                </button>
            </div>
        </div>
    </div>
</div>
