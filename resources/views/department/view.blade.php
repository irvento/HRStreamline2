<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Department Details') }}
        </h2>
    </x-slot>

    <div class="mb-6">
        <a href="{{ url()->previous()  }}" 
            class="inline-flex items-center px-4 py-2 bg-gray-600 text-white font-medium rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-offset-gray-800">
            <i class="bi bi-arrow-left mr-2"></i> Back to Departments
        </a>
    </div>

    <!-- Department Details -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 space-y-6 border-2 border-white dark:border-gray-700">
        <!-- Department Name -->
        <div class="text-center">
            <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
                {{ $department->department_name }}
            </h3>
            <p class="text-sm text-gray-600 dark:text-gray-400">Details of this department</p>
        </div>

        <!-- Department Head -->
        <div class="flex items-center justify-center space-x-4">
            <div class="flex-shrink-0">
                <i class="bi bi-person-circle text-5xl text-blue-500 dark:text-blue-400"></i>
            </div>
            <div>
                <p class="text-sm text-gray-600 dark:text-gray-400 font-medium uppercase">Department Head</p>
                <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                    {{ $department->department_head_fname ?? 'Not Assigned' }} {{ $department->department_head_lname ?? '' }}
                </h4>
            </div>
        </div>

        <!-- Employee Count -->
        <div class="text-center">
            <p class="text-sm text-gray-600 dark:text-gray-400 font-medium uppercase">Total Employees</p>
            <h4 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">{{ $employeeCount }}</h4>
        </div>
    </div>

    <!-- Employees List -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg mt-6 p-6 border-2 border-white dark:border-gray-700">
        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Employees</h4>
        @if ($employees->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($employees as $employee)
                    <div class="flex items-center space-x-3 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg shadow hover:bg-gray-100 dark:hover:bg-gray-600 transition border-2 border-white dark:border-gray-700">
                        <div class="flex-shrink-0">
                            <i class="bi bi-person-fill text-2xl text-blue-500 dark:text-blue-400"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800 dark:text-gray-200">
                                {{ $employee->employee_fname }} {{ $employee->employee_lname }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-sm text-gray-600 dark:text-gray-400">There are no employees in this department yet.</p>
        @endif
    </div>
</x-app-layout>
