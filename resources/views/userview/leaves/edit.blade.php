<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($leave) ? 'Edit Leave' : 'Create Leave' }}
        </h2>
    </x-slot>

    <!-- Back Button -->
    <div class="mb-4">
        <a href="{{ url()->previous() }}"
            class="inline-flex items-center px-4 py-2 bg-gray-600 text-white font-medium rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-offset-gray-800">
            Back
        </a>
    </div>

    <!-- Form Container -->
    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        <form action="{{ isset($leave) ? route('leaveuser.update', $leave->leave_id) : route('leaveuser.store') }}" method="POST">
            @csrf
            @if(isset($leave)) @method('PUT') @endif


            <!-- Start Date -->
            <div class="mb-4">
                <label for="start_date" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Start Date</label>
                <input type="date" name="start_date" id="start_date" 
                    value="{{ old('start_date', $leave->start_date ?? '') }}" 
                    class="mt-1 block w-full px-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-700 focus:ring focus:ring-primary-200 dark:bg-gray-700 dark:text-gray-300"
                    required>
                @error('start_date')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- End Date -->
            <div class="mb-4">
                <label for="end_date" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">End Date</label>
                <input type="date" name="end_date" id="end_date" 
                    value="{{ old('end_date', $leave->end_date ?? '') }}" 
                    class="mt-1 block w-full px-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-700 focus:ring focus:ring-primary-200 dark:bg-gray-700 dark:text-gray-300"
                    required>
                @error('end_date')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>


            <!-- Remarks -->
            <div class="mb-4">
                <label for="remarks" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Remarks</label>
                <textarea name="remarks" id="remarks" rows="4" 
                    class="mt-1 block w-full px-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-700 focus:ring focus:ring-primary-200 dark:bg-gray-700 dark:text-gray-300"
                    placeholder="Enter remarks (optional)">{{ old('remarks', $leave->remarks ?? '') }}</textarea>
                @error('remarks')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" 
                    class="px-6 py-2 bg-primary-500 text-white font-medium rounded-lg hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500 dark:focus:ring-offset-gray-800">
                    {{ isset($leave) ? 'Update Leave' : 'Create Leave' }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
