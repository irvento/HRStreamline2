<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Department Management') }}
        </h2>
    </x-slot>

    <div class="w-full mt-8">
        <!-- Search Bar -->
        <div class="mb-4 flex justify-between items-center">
            <form method="GET" action="{{ route('department.index') }}" class="flex gap-4 items-center">
                <input type="text" name="search" value="{{ $search ?? '' }}" 
                    placeholder="Search departments..." 
                    class="flex-grow px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 focus:ring focus:ring-primary-200">
                <button type="submit" 
                    class="px-6 py-2 bg-primary-500 text-white rounded-lg hover:bg-primary-600 transition">
                    Search
                </button>
            </form>
            <!-- Add Button -->
            <a href="{{ route('department.create') }}" 
                class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                <i class="bi bi-plus"></i> Add Department
            </a>
        </div>

        <!-- Department List -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md">
            @if ($departments->count() > 0)
                @foreach ($departments as $department)
                    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <div>
                            <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $department->department_name }}</p>
                        </div>
                        <div class="flex items-center gap-4">
                            <!-- Edit Button -->
                            <a href="{{ route('department.edit', $department->department_id) }}"
                                class="px-4 py-2 text-sm text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 transition">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <!-- Delete Button -->
                            <a href="{{ route('department.delete_confirmation', $department->department_id) }}" 
                                class="px-4 py-2 text-sm text-white bg-red-500 rounded-lg hover:bg-red-600 transition">
                                <i class="bi bi-trash"></i> Delete
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="px-6 py-4 text-gray-600 dark:text-gray-400">No departments found.</p>
            @endif
        </div>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $departments->links('pagination::tailwind') }}
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    @if(session('delete_id'))
        <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg max-w-sm w-full p-6">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Delete Department</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Are you sure you want to delete the department <strong>{{ session('delete_name') }}</strong>? This action cannot be undone.
                </p>
                <form action="{{ route('department.destroy', session('delete_id')) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="flex justify-end gap-4">
                        <button type="button" class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200 bg-gray-300 dark:bg-gray-700 rounded-lg hover:bg-gray-400 transition" 
                            onclick="window.location.href='{{ route('department.index') }}'">
                            Cancel
                        </button>
                        <button type="submit" 
                            class="px-4 py-2 text-sm text-white bg-red-500 rounded-lg hover:bg-red-600 transition">
                            Delete
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</x-app-layout>
