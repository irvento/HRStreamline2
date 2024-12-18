<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">Salary Details</h1>
        <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Salary ID</h2>
                <p class="text-gray-600 dark:text-gray-400">{{ $salary->salary_id }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Salary Grade</h2>
                <p class="text-gray-600 dark:text-gray-400">{{ $salary->salary_grade }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Salary Amount</h2>
                <p class="text-gray-600 dark:text-gray-400">{{ number_format($salary->salary_amount, 2) }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Payment Frequency</h2>
                <p class="text-gray-600 dark:text-gray-400">{{ $salary->paymentFrequency->payment_name }}</p>
            </div>
            <div class="flex justify-end mt-6 gap-4">
                <a href="{{ route('salary', $salary->salary_id) }}"
                    class="px-4 py-2 text-sm text-white bg-green-500 rounded-lg hover:bg-green-600 transition">
                     Back
                 </a>
                <a href="{{ route('salary.edit', $salary->salary_id) }}"
                   class="px-4 py-2 text-sm text-white bg-green-500 rounded-lg hover:bg-green-600 transition">
                    Edit
                </a>
                <form action="{{ route('salary.destroy', $salary->salary_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="px-4 py-2 text-sm text-white bg-red-500 rounded-lg hover:bg-red-600 transition">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
