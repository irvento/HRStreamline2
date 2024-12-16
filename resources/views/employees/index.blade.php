<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employee Information') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Display Success Message -->
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Link to Create New Employee -->
            <a href="{{ route('employees.create') }}" class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">
                Add New Employee
            </a>

            <!-- Employee Table -->
            <div class="mt-6 bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full table-auto text-gray-700 dark:text-gray-300">
                    <thead class="bg-gray-800 text-white dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">First Name</th>
                            <th class="px-4 py-2">Last Name</th>
                            <th class="px-4 py-2">Phone Number</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100 dark:bg-gray-900">
                        @foreach ($employees as $employee)
                            <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                <td class="px-4 py-2">{{ $employee->name }}</td>
                                <td class="px-4 py-2">{{ $employee->employee_fname }}</td>
                                <td class="px-4 py-2">{{ $employee->employee_lname }}</td>
                                <td class="px-4 py-2">{{ $employee->phonenumber }}</td>
                                <td class="px-4 py-2">
                                    <!-- Edit Button -->
                                    <a href="{{ route('employees.edit', $employee->employee_id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">
                                        Edit
                                    </a>

                                    <!-- Delete Form -->
                                    <form action="{{ route('employees.destroy', $employee->employee_id) }}" method="POST" class="inline-block ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</x-app-layout>
