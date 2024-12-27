<x-app-layout>
    <div x-data="{ showModal: false, actionUrl: '', employeeName: '', employeeAction: '' }" class="w-full mt-8">
        <!-- Search Bar and Filter -->
        <div class="mb-4 flex items-center gap-4">
            <!-- Search Bar -->
            <form method="GET" action="{{ route('employees') }}" class="flex flex-grow gap-4">
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search employees..."
                    class="flex-grow px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 focus:ring focus:ring-primary-200">
                <button type="submit"
                    class="px-5 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Search
                </button>
            </form>

            <!-- Filter Dropdown -->
            <div x-data="{ showFilter: false }" class="relative">
                <button @click="showFilter = !showFilter"
                    class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                    Filter
                </button>
                <div x-show="showFilter" @click.outside="showFilter = false"
                    class="absolute right-0 mt-2 w-40 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                    <a href="{{ route('employees', ['status' => 'all'] + request()->except('page')) }}"
                        class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                        All Employees
                    </a>
                    <a href="{{ route('employees', ['status' => 'active'] + request()->except('page')) }}"
                        class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                        Active Employees
                    </a>
                    <a href="{{ route('employees', ['status' => 'inactive'] + request()->except('page')) }}"
                        class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                        Inactive Employees
                    </a>
                </div>
            </div>
        </div>

        <!-- Employee List -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md">
            @if ($employees->count() > 0)
                @foreach ($employees as $employee)
                    <div
                        class="flex items-center justify-between px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center gap-4">
                            <img src="{{ asset($employee->image) }}" alt="Employee"
                                class="w-12 h-12 rounded-full object-cover">
                            <div>
                                <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                    {{ $employee->employee_fname }} {{ $employee->employee_lname }}
                                    <!-- Registration Status -->
                                    @if ($employee->is_registered)
                                        <span class="ml-2 text-xs text-yellow-600 bg-yellow-100 px-2 py-1 rounded-full">
                                            Registered
                                        </span>
                                    @else
                                        <span class="ml-2 text-xs text-gray-400 bg-gray-200 px-2 py-1 rounded-full">
                                            Not Registered
                                        </span>
                                    @endif

                                    <!-- Active/Inactive Status -->
                                    <button
                                        @click="showModal = true; actionUrl = '{{ route('employees.toggleStatus', $employee->employee_id) }}'; employeeName = '{{ $employee->employee_fname }}'; employeeAction = '{{ $employee->status === 'active' ? 'Deactivate' : 'Activate' }}';"
                                        class="ml-2 text-xs px-2 py-1 rounded-full cursor-pointer"
                                        :class="{
                                            'bg-green-100 text-green-600': '{{ $employee->status }}'
                                            === 'active',
                                            'bg-gray-200 text-gray-400': '{{ $employee->status }}'
                                            === 'inactive'
                                        }">
                                        {{ $employee->status === 'active' ? 'Active' : 'Inactive' }}
                                    </button>
                                </p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $employee->employee_email }}</p>
                            </div>
                        </div>
                        <!-- Other Buttons (View/Edit/Delete) -->
                        <div class="flex items-center gap-4">
                            <a href="{{ route('employees.details', $employee->employee_id) }}"
                                class="px-4 py-2 text-sm text-white bg-green-500 rounded-lg hover:bg-green-600 transition">
                                <i class="bi bi-pencil"></i> View
                            </a>
                            <a href="{{ route('employees.edit', $employee->employee_id) }}"
                                class="px-4 py-2 text-sm text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 transition">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <button
                                @click="showModal = true; actionUrl = '{{ route('employees.destroy', $employee->employee_id) }}'; employeeName = '{{ $employee->employee_fname }}'; employeeAction = 'Delete';"
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

        <!-- Confirmation Modal -->
        <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="w-full max-w-sm p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Confirm Action</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">
                    Are you sure you want to <span class="font-bold" x-text="employeeAction"></span>
                    <span class="font-bold" x-text="employeeName"></span>? This action cannot be undone.
                </p>
                <div class="flex justify-end gap-4">
                    <button @click="showModal = false"
                        class="px-4 py-2 text-sm text-gray-800 bg-gray-200 rounded-lg hover:bg-gray-300 transition">
                        Cancel
                    </button>
                    <form :action="actionUrl" method="POST" class="inline">
                        @csrf
                        @method('POST')
                        <button type="submit"
                            class="px-4 py-2 text-sm text-white bg-red-500 rounded-lg hover:bg-red-600 transition">
                            Confirm
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
