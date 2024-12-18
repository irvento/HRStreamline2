<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Department') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <!-- Back Button -->
        <div class="mb-4">
            <a href="{{ url()->previous() }}"
                class="inline-flex items-center px-4 py-2 bg-gray-600 text-white font-medium rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-offset-gray-800">
                Back
            </a>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form action="{{ route('department.update', $department->department_id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Use PUT for updating records -->

                <!-- Department Name -->
                <div class="mb-4">
                    <label for="department_name"
                        class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Department Name</label>
                    <input type="text" name="department_name" id="department_name"
                        value="{{ old('department_name', $department->department_name) }}"
                        class="mt-1 block w-full px-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-700 focus:ring focus:ring-primary-200" />
                    @error('department_name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Department Head Dropdown -->
                <div class="mb-4">
                    <label for="department_head"
                        class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Department Head</label>
                    <select name="department_head" id="department_head"
                        class="mt-1 block w-full px-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-700 focus:ring focus:ring-primary-200">
                        <option value="" disabled>Select Department Head</option>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->employee_id }}"
                                {{ $department->department_head == $employee->employee_id ? 'selected' : '' }}>
                                {{ $employee->employee_fname }}{{ $employee->employee_lname}}
                            </option>
                        @endforeach
                    </select>
                    @error('department_head')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit"
                        class="px-4 py-2 text-sm text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 transition">
                        Update Department
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
