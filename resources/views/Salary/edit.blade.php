<x-app-layout>
    <div class="max-w-4xl mx-auto mt-8 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
        <h1 class="text-3xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Edit Salary</h1>

        <form action="{{ route('salary.update', $salary->salary_id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="space-y-2">
                <label for="salary_grade" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Salary Grade</label>
                <input type="text" name="salary_grade" id="salary_grade" value="{{ old('salary_grade', $salary->salary_grade) }}" 
                    class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-500" required>
                @error('salary_grade')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="salary_amount" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Salary Amount</label>
                <input type="number" name="salary_amount" id="salary_amount" value="{{ old('salary_amount', $salary->salary_amount) }}" 
                    class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-500" required>
                @error('salary_amount')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="payment_frequency_id" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Payment Frequency</label>
                <select name="payment_frequency_id" id="payment_frequency_id" 
                    class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-500" required>
                    <option value="" disabled>Select Payment Frequency</option>
                    @foreach ($paymentFrequencies as $frequency)
                        <option value="{{ $frequency->payment_frequency_id }}" 
                            {{ $salary->payment_frequency_id == $frequency->payment_frequency_id ? 'selected' : '' }}>
                            {{ $frequency->payment_name }}
                        </option>
                    @endforeach
                </select>
                @error('payment_frequency_id')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end gap-4">
                <button type="submit" 
                    class="px-6 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition">
                    Update Salary
                </button>
                <a href="{{ route('salary') }}" 
                    class="px-6 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
