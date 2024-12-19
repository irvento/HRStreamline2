<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Department Management') }}
        </h2>
    </x-slot>

    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ url()->previous() }}" 
            class="inline-flex items-center px-4 py-2 bg-gray-600 text-white font-medium rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-offset-gray-800">
            <i class="bi bi-arrow-left mr-2"></i> Back
        </a>
    </div>

    <!-- Main Content -->
    <div x-data="{ showModal: false, deleteUrl: '', departmentName: '' }" class="w-full space-y-6">
        <!-- Search and Add Section -->
        <div class="flex justify-between items-center">
            <form method="GET" action="{{ route('department.index') }}" class="flex w-full max-w-md">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ $search ?? '' }}" 
                    placeholder="Search departments..." 
                    class="flex-grow px-4 py-2 rounded-l-lg border-t border-l border-b border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-blue-400 transition"
                >
                <button 
                    type="submit" 
                    class="px-6 py-2 bg-blue-500 text-white font-medium rounded-r-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 transition"
                >
                    <i class="bi bi-search"></i> Search
                </button>
            </form>
            <a href="{{ route('department.create') }}" 
                class="ml-6 px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                <i class="bi bi-plus-lg"></i> Add Department
            </a>
        </div>

        <!-- Department List -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg divide-y divide-gray-200 dark:divide-gray-700">
            @if ($departments->count() > 0)
                @foreach ($departments as $department)
                <div class="flex items-center justify-between px-6 py-4">
                    <div>
                        <div class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                            {{ $department->department_name }}
                        </div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            Head: {{ $department->department_head_fname ?? 'Not Assigned' }}  {{ $department->department_head_lname ?? 'Not Assigned' }}
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('department.edit', $department->department_id) }}" 
                            class="px-4 py-2 text-sm text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 transition">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <button 
                            @click="showModal = true; deleteUrl = '{{ route('department.destroy', $department->department_id) }}'; departmentName = '{{ $department->department_name }}';"
                            class="px-4 py-2 text-sm text-white bg-red-500 rounded-lg hover:bg-red-600 transition">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </div>
                </div>
                @endforeach
            @else
                <div class="px-6 py-4 text-gray-600 dark:text-gray-400">
                    No departments found.
                </div>
            @endif
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $departments->links('pagination::tailwind') }}
        </div>

        <!-- Delete Confirmation Modal -->
        <div x-show="showModal" x-cloak class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="w-full max-w-sm p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Confirm Deletion</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">
                    Are you sure you want to delete the department <strong x-text="departmentName"></strong>? This action cannot be undone.
                </p>
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
