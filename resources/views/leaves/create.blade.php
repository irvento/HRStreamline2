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
        @if (Auth::user()->role === 'admin')
        <form action="{{ route('leaves.store') }}" method="POST" class="space-y-6">
            @csrf
            <!-- Employee Selection (Only for Admin) -->
            <div class="mt-4">
                <label for="employee_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Select Employee</label>
                <div class="relative">
                    <select name="employee_id" id="employee_id" required
                        class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected>Select Employee</option>
                        @foreach($employee as $employee)
                            <option value="{{ $employee->employee_id }}">
                                {{ $employee->employee_fname }} {{ $employee->employee_lname }}
                            </option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <!-- Leave Dates and Status -->
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
        @endif

        @if (Auth::user()->role === 'user')
        <form action="{{ route('leaveuser.store') }}" method="POST" class="space-y-6">
            @csrf
            <!-- Leave Dates and Status for User -->
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
            <!-- Hidden Input to Force 'Pending' value -->
            <input type="hidden" name="leave_status" value="Pending">
            <div class="space-y-2">
                <label for="remarks" class="block text-gray-700 dark:text-gray-300">Remarks</label>
                <textarea id="remarks" name="remarks" rows="4" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-primary-300 dark:border-gray-700"></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" 
                    class="px-6 py-2 dark:text-white  bg-primary-500 rounded-lg hover:bg-primary-600 transition">
                    Submit
                </button>
            </div>
        </form>
        @endif
    </div>
</x-app-layout>
