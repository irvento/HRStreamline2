<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employee Management') }}
        </h2>
    </x-slot>

    <div x-data="{ selectedTab: 'attendance', showModal: false, showViewModal: false, deleteUrl: '', employee: {} }" class="w-full mt-8">

        <!-- Tab Navigation -->
        <div class="flex gap-6 border-b-2 border-gray-200 dark:border-gray-700" role="tablist" aria-label="Employee Management Tabs">
            <button @click="selectedTab = 'attendance'" 
                :class="selectedTab === 'attendance' ? 
                    'text-primary-600 border-primary-600 font-semibold' :
                    'text-gray-500 hover:text-primary-600 border-transparent'"
                class="pb-2 border-b-2 text-sm uppercase transition" role="tab">
                Attendance
            </button>
            <button @click="selectedTab = 'leaves'" 
                :class="selectedTab === 'leaves' ? 
                    'text-primary-600 border-primary-600 font-semibold' :
                    'text-gray-500 hover:text-primary-600 border-transparent'"
                class="pb-2 border-b-2 text-sm uppercase transition" role="tab">
                Leaves
            </button>
            <button @click="selectedTab = 'employee_directory'" 
                :class="selectedTab === 'employee_directory' ? 
                    'text-primary-600 border-primary-600 font-semibold' :
                    'text-gray-500 hover:text-primary-600 border-transparent'"
                class="pb-2 border-b-2 text-sm uppercase transition" role="tab">
                Employee Directory
            </button>
            <button @click="selectedTab = 'performance'" 
                :class="selectedTab === 'performance' ? 
                    'text-primary-600 border-primary-600 font-semibold' :
                    'text-gray-500 hover:text-primary-600 border-transparent'"
                class="pb-2 border-b-2 text-sm uppercase transition" role="tab">
                Performance
            </button>
            <button @click="selectedTab = 'salary_reports'" 
                :class="selectedTab === 'salary_reports' ? 
                    'text-primary-600 border-primary-600 font-semibold' :
                    'text-gray-500 hover:text-primary-600 border-transparent'"
                class="pb-2 border-b-2 text-sm uppercase transition" role="tab">
                Salary Reports
            </button>
            <button @click="selectedTab = 'department_analysis'" 
                :class="selectedTab === 'department_analysis' ? 
                    'text-primary-600 border-primary-600 font-semibold' :
                    'text-gray-500 hover:text-primary-600 border-transparent'"
                class="pb-2 border-b-2 text-sm uppercase transition" role="tab">
                Department Analysis
            </button>
            <button @click="selectedTab = 'custom_reports'" 
                :class="selectedTab === 'custom_reports' ? 
                    'text-primary-600 border-primary-600 font-semibold' :
                    'text-gray-500 hover:text-primary-600 border-transparent'"
                class="pb-2 border-b-2 text-sm uppercase transition" role="tab">
                Custom Reports
            </button>
        </div>

        <!-- Tab Content -->
        <div class="mt-6">
            <div x-show="selectedTab === 'attendance'">
                <!-- Attendance content goes here -->
            </div>
            <div x-show="selectedTab === 'leaves'">
                <!-- Leaves content goes here -->
            </div>
            <div x-show="selectedTab === 'employee_directory'">
                <!-- Employee Directory content goes here -->
            </div>
            <div x-show="selectedTab === 'performance'">
                <!-- Performance content goes here -->
            </div>
            <div x-show="selectedTab === 'salary_reports'">
                <!-- Salary Reports content goes here -->
            </div>
            <div x-show="selectedTab === 'department_analysis'">
                <!-- Department Analysis content goes here -->
            </div>
            <div x-show="selectedTab === 'custom_reports'">
                <!-- Custom Reports content goes here -->
            </div>
        </div>
    </div>
</x-app-layout>
