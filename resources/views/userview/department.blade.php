<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Department Management') }}
        </h2>
    </x-slot>
<br><br>

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
                        <a href="{{ route('department.view', $department->department_id) }}" 
                            class="px-4 py-2 text-sm text-white bg-blue-500 rounded-lg hover:bg-blue-600 transition">
                            <i class="bi bi-eye"></i> View
                        </a>
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

    </div>
</x-app-layout>
