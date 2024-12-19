<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employee Management') }}
        </h2>
    </x-slot>

    <div x-data="{ showModal: false, deleteUrl: '', employee: {} }" class="w-full mt-8">
        <!-- Search Bar -->
        <div class="mb-4">
            <form method="GET" action="{{ route('employees') }}" class="flex gap-4 items-center">
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search employees..."
                    class="flex-grow px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 focus:ring focus:ring-primary-200">
                <button type="submit"
                    class="px-6 py-2 bg-primary-500 text-white rounded-lg hover:bg-primary-600 transition">
                    Search
                </button>
            </form>
        </div>

        <!-- Employee List -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md">
            @if ($employees->count() > 0)
                @foreach ($employees as $employee)
                    <div
                        class="flex items-center justify-between px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center gap-4">
                            <img src="{{ asset($employee->image) }}" alt="Employee" class="w-12 h-12 rounded-full">
                            <div>
                                <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                    {{ $employee->employee_fname }} {{ $employee->employee_lname }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $employee->employee_email }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <!-- View Button -->
                            <a href="{{ route('employees.details', $employee->employee_id) }}"
                                class="px-4 py-2 text-sm text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 transition">
                                <i class="bi bi-pencil"></i> View
                            </a>
                            <!-- Edit Button -->
                            <a href="{{ route('employees.edit', $employee->employee_id) }}"
                                class="px-4 py-2 text-sm text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 transition">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <!-- Delete Button -->
                            <button
                                @click="showModal = true; deleteUrl = '{{ route('employees.destroy', $employee->employee_id) }}';"
                                class="px-4 py-2 text-sm text-white bg-red-500 rounded-lg hover:bg-red-600 transition">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="px-6 py-4 text-gray-600 dark:text-gray-400">No employees found.</p>
            @endif
        </div>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $employees->links('pagination::tailwind') }}
        </div>

        <!-- Delete Confirmation Modal -->
        <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="w-full max-w-sm p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Confirm Deletion</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Are you sure you want to delete this record?
                    This action cannot be undone.</p>
                <div class="flex justify-end gap-4">
                    <button @click="showModal = false"
                        class="px-4 py-2 text-sm text-gray-800 bg-gray-200 rounded-lg hover:bg-gray-300 transition">
                        Cancel
                    </button>
                    <form :action="deleteUrl" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 text-sm text-white bg-red-500 rounded-lg hover:bg-red-600 transition">
                            Confirm Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
