
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Account') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
    <form action="{{ route('employees.update', $employee->employee_id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="employee_mname" class="text-gray-800 dark:text-gray-200">Middle Name</label>
        <input type="text" name="employee_mname" id="employee_mname" value="{{ $employee->employee_mname }}" required>
    
        <label for="employee_lname" class="text-gray-800 dark:text-gray-200">Last Name</label>
        <input type="text" name="employee_lname" id="employee_lname" value="{{ $employee->employee_lname }}" required>
    
        <label for="employee_fname" class="text-gray-800 dark:text-gray-200">First Name</label>
        <input type="text" name="employee_fname" id="employee_fname" value="{{ $employee->employee_fname }}" required>
    
        <!-- Other fields -->
    
        <button type="submit" class="text-gray-800 dark:text-gray-200">Update Employee</button>
    </form>
        </div>
    </div>
</x-app-layout>
