<div class="overflow-x-auto" x-data="{ showModal: false, deleteUrl: '' }">
    <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md rounded-lg">
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Salary ID</th>
                <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Salary Grade</th>
                <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Salary Amount</th>
                <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Payment Frequency ID</th>
                <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salaries as $salary)
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <td class="px-4 py-2 text-gray-800 dark:text-gray-300">{{ $salary->salary_id }}</td>
                    <td class="px-4 py-2 text-gray-800 dark:text-gray-300">{{ $salary->salary_grade }}</td>
                    <td class="px-4 py-2 text-gray-800 dark:text-gray-300">{{ $salary->salary_amount }}</td>
                    <td class="px-4 py-2 text-gray-800 dark:text-gray-300">{{ $salary->payment_frequency_id }}</td>
                    <td class="px-4 py-2 text-gray-800 dark:text-gray-300">
                        <div class="flex items-center gap-4">
                            <!-- View Button -->
                            <a href="{{ route('salary.view', $salary->salary_id) }}"
                                class="px-4 py-2 text-sm text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 transition">
                                <i class="bi bi-pencil"></i> View
                            </a>

                            <!-- Edit Button -->
                            <a href="{{ route('salary.edit', $salary->salary_id) }}"
                                class="px-4 py-2 text-sm text-white bg-green-500 rounded-lg hover:bg-green-600 transition">
                                <i class="bi bi-pencil"></i> Edit
                            </a>

                            <!-- Delete Button that triggers the Modal -->
                            <button @click="showModal = true; deleteUrl = '{{ route('salary.destroy', $salary->salary_id) }}'"
                                class="px-4 py-2 text-sm text-white bg-red-500 rounded-lg hover:bg-red-600 transition">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Delete Confirmation Modal -->
    <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" x-cloak>
        <div class="w-full max-w-sm p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Confirm Deletion</h2>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Are you sure you want to delete this record? This action cannot be undone.</p>
            <div class="flex justify-end gap-4">
                <button @click="showModal = false" class="px-4 py-2 text-sm text-gray-800 bg-gray-200 rounded-lg hover:bg-gray-300 transition">
                    Cancel
                </button>
                <!-- The delete form is submitted with the deleteUrl -->
                <form :action="deleteUrl" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 text-sm text-white bg-red-500 rounded-lg hover:bg-red-600 transition">
                        Confirm Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
