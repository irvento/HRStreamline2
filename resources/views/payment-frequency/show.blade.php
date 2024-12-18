<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">Payment Frequency Details</h1>
        <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
            <!-- Payment Frequency Name -->
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Payment Name</h2>
                <p class="text-gray-600 dark:text-gray-400">{{ $paymentFrequency->payment_name }}</p>
            </div>

            <!-- Back Button -->
            <div class="flex justify-end mt-6 gap-4">
                 <a href="{{ url('/salaries#PaymentFrequencyType') }}"
                   class="px-4 py-2 text-sm text-white bg-blue-500 rounded-lg hover:bg-blue-600 transition">
                    Back to List
                </a>
                <a href="{{ route('payment-frequency.edit', $paymentFrequency->payment_frequency_id) }}"
                   class="px-4 py-2 text-sm text-white bg-green-500 rounded-lg hover:bg-green-600 transition">
                    Edit
                </a>
                <form action="{{ route('payment-frequency.destroy', $paymentFrequency->payment_frequency_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this payment frequency?')">
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
