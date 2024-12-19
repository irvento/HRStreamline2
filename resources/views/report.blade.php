<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reports') }}
        </h2>
    </x-slot>

    <div x-data="{ selectedTab: 'attendance' }" class="flex h-full mt-8">

        <!-- Side Navigation -->
        <nav class="w-64 bg-gray-50 dark:bg-gray-900 border-r border-gray-200 dark:border-gray-700 flex flex-col">
            <!-- Logo Section -->
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <a href="#" class="flex items-center space-x-4">
                    <img src="https://via.placeholder.com/40" alt="Logo" class="w-10 h-10 rounded-full">
                    <span class="text-xl font-semibold text-gray-800 dark:text-gray-200">HR Streamline</span>
                </a>
            </div>

            <!-- Navigation Links -->
            <ul class="flex-1 space-y-4 mt-6 px-4">
                <li>
                    <button @click="selectedTab = 'attendance'"
                        :class="selectedTab === 'attendance' ?
                            'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-300 font-semibold' :
                            'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800'"
                        class="w-full flex items-center p-3 rounded-lg transition">
                        <i class="fas fa-calendar-check mr-3"
                            :class="selectedTab === 'attendance' ? 'text-blue-500' : 'text-gray-400'"></i>
                        Attendance
                    </button>
                </li>
                <li>
                    <button @click="selectedTab = 'leaves'"
                        :class="selectedTab === 'leaves' ?
                            'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-300 font-semibold' :
                            'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800'"
                        class="w-full flex items-center p-3 rounded-lg transition">
                        <i class="fas fa-leaf mr-3"
                            :class="selectedTab === 'leaves' ? 'text-green-500' : 'text-gray-400'"></i>
                        Leaves
                    </button>
                </li>
                <li>
                    <button @click="selectedTab = 'employee_directory'"
                        :class="selectedTab === 'employee_directory' ?
                            'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-300 font-semibold' :
                            'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800'"
                        class="w-full flex items-center p-3 rounded-lg transition">
                        <i class="fas fa-users mr-3"
                            :class="selectedTab === 'employee_directory' ? 'text-purple-500' : 'text-gray-400'"></i>
                        Employee Directory
                    </button>
                </li>
                <li>
                    <button @click="selectedTab = 'performance'"
                        :class="selectedTab === 'performance' ?
                            'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-300 font-semibold' :
                            'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800'"
                        class="w-full flex items-center p-3 rounded-lg transition">
                        <i class="fas fa-chart-line mr-3"
                            :class="selectedTab === 'performance' ? 'text-red-500' : 'text-gray-400'"></i>
                        Performance
                    </button>
                </li>
                <li>
                    <button @click="selectedTab = 'salary_reports'"
                        :class="selectedTab === 'salary_reports' ?
                            'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-300 font-semibold' :
                            'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800'"
                        class="w-full flex items-center p-3 rounded-lg transition">
                        <i class="fas fa-wallet mr-3"
                            :class="selectedTab === 'salary_reports' ? 'text-yellow-500' : 'text-gray-400'"></i>
                        Salary Reports
                    </button>
                </li>
                <li>
                    <button @click="selectedTab = 'department_analysis'"
                        :class="selectedTab === 'department_analysis' ?
                            'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-300 font-semibold' :
                            'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800'"
                        class="w-full flex items-center p-3 rounded-lg transition">
                        <i class="fas fa-sitemap mr-3"
                            :class="selectedTab === 'department_analysis' ? 'text-teal-500' : 'text-gray-400'"></i>
                        Department Analysis
                    </button>
                </li>
                <li>
                    <button @click="selectedTab = 'custom_reports'"
                        :class="selectedTab === 'custom_reports' ?
                            'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-300 font-semibold' :
                            'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800'"
                        class="w-full flex items-center p-3 rounded-lg transition">
                        <i class="fas fa-file-alt mr-3"
                            :class="selectedTab === 'custom_reports' ? 'text-pink-500' : 'text-gray-400'"></i>
                        Custom Reports
                    </button>
                </li>
            </ul>



        </nav>

        <!-- Main Content -->
        <main class="flex-1 p-6">

            <!-- ATTENDANCE -->
            <div x-show="selectedTab === 'attendance'">


                <h3 class="text-lg font-semibold">All Records</h3>
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Attendance Records</h3>

                <div class="mb-4 flex items-center space-x-4">
                    <form method="GET" action="{{ route('report') }}" class="flex space-x-2">
                        <div>
                            <label for="start_date"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Date</label>
                            <input type="date" id="start_date" name="start_date" value="{{ request('start_date') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:border-gray-600">
                        </div>
                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">End
                                Date</label>
                            <input type="date" id="end_date" name="end_date" value="{{ request('end_date') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:border-gray-600">
                        </div>
                        <div>
                            <label for="search"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Search</label>
                            <input type="text" id="search" name="search" value="{{ request('search') }}"
                                placeholder="Search by Employee ID"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:border-gray-600">
                        </div>
                        <div class="flex items-end">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600">
                                Filter
                            </button>
                        </div>
                    </form>
                </div>

                <table class="w-full bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                    <thead class="bg-gray-200 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-800 dark:text-gray-200">
                                Attendance ID
                            </th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-800 dark:text-gray-200">
                                Employee ID
                            </th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-800 dark:text-gray-200">Date
                            </th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-800 dark:text-gray-200">Time In
                            </th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-800 dark:text-gray-200">Time
                                Out</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attendance as $attendances)
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $attendances->attendance_id }}
                                </td>
                                <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $attendances->employee_id }}
                                </td>
                                <td class="px-4 py-2 text-gray-700 dark:text-gray-300">
                                    {{ $attendances->attendance_date }}</td>
                                <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $attendances->time_in }}</td>
                                <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $attendances->time_out }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- LEAVES -->
            <div x-show="selectedTab === 'leaves'">

              
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
        </main>
    </div>
</x-app-layout>
