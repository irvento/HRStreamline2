<!-- resources/views/department/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Department') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form action="{{ route('department.update', $department->department_id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Use PUT for updating records -->

                <!-- Department Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Department Name</label>
                    <input type="text" name="department_name" value="{{ old('department_name', $department->department_name) }}"
 
                        class="mt-1 block w-full px-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-700 focus:ring focus:ring-primary-200" />
                    @error('name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>



                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" class="px-6 py-2 bg-primary-500 text-white rounded-lg hover:bg-primary-600 transition">Update Department</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
