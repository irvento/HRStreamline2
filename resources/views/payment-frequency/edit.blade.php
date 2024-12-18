<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">Edit Payment Frequency</h1>

        <form action="{{ route('payment-frequency.update', $paymentFrequency->payment_frequency_id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Payment Name Input -->
            <div>
                <label for="payment_name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Payment Name:</label>
                <input type="text" name="payment_name" id="payment_name" value="{{ $paymentFrequency->payment_name }}" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>

            <!-- Buttons Section -->
            <div class="flex justify-between items-center">
                <!-- Back to List Button -->
                <a href="{{ url('/salaries#PaymentFrequencyType') }}" class="px-6 py-2 text-sm text-white bg-blue-500 rounded-lg hover:bg-blue-600 transition">
                    Back to List
                </a>

                <!-- Update Button -->
                <button type="submit" class="px-6 py-2 text-sm text-white bg-green-500 rounded-lg hover:bg-green-600 focus:ring-2 focus:ring-green-400 transition">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
