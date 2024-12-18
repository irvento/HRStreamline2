<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Leave') }}
        </h2>
    </x-slot>
     <!-- Back Button -->
     <div class="mb-4">
        <a href="{{ url()->previous() }}"
            class="inline-flex items-center px-4 py-2 bg-gray-600 text-white font-medium rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-offset-gray-800">
            Back
        </a>
    </div>   
    <div class="mt-8 max-w-3xl mx-auto">
        <form action="{{ route('leaves.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="space-y-2">
                <label for="start_date" class="block text-gray-700 dark:text-gray-300">Start Date</label>
                <input type="date" id="start_date" name="start_date" required 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-primary-300 dark:border-gray-700">
            </div>
            <div class="space-y-2">
                <label for="end_date" class="block text-gray-700 dark:text-gray-300">End Date</label>
                <input type="date" id="end_date" name="end_date" required 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-primary-300 dark:border-gray-700">
            </div>
            <div class="space-y-2">
                <label for="leave_status" class="block text-gray-700 dark:text-gray-300">Leave Status</label>
                <select id="leave_status" name="leave_status" required 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-primary-300 dark:border-gray-700">
                    <option value="Pending">Pending</option>
                    <option value="Approved">Approved</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div>
            <div class="space-y-2">
                <label for="remarks" class="block text-gray-700 dark:text-gray-300">Remarks</label>
                <textarea id="remarks" name="remarks" rows="4" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-primary-300 dark:border-gray-700"></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" 
                    class="px-6 py-2 text-white bg-primary-500 rounded-lg hover:bg-primary-600 transition">
                    Submit
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
