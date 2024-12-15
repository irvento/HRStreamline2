<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('EMPLOYEE') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($employeeuser as $employees)
        <ul class="list-group list-group-light">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <img src="" alt="Employee Image" style="width: 45px; height: 45px" class="rounded-circle" />
                    <div class="ms-3">
                        <p class="fw-bold mb-1">{{ $employees->full_name }} {{ $employees->employee_name }}</p>
                        <p class="fw-bold mb-1">{{ $employees->first_name }} {{ $employees->middle_name }} {{ $employees->last_name }} </p>
                        <p class="text-muted mb-0">{{ $employees->contact1 }}</p>
                    </div>
                </div>
            </li>
        </ul>
        @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
