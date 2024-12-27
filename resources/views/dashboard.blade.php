<x-app-layout>
    <div class="flex items-center min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="container max-w-7xl px-6 mx-auto my-10">
            <!-- Admin Section -->
            @if (Auth::user()->role === 'admin')
                <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    <!-- Admin Links -->
                    <a href="{{ route('qualifications.index') }}" class="card">
                        <div class="flex flex-col items-center">
                            <div class="icon bg-emerald-50 text-emerald-400"><i class="fas fa-certificate text-3xl"></i>
                            </div>
                            <div class="text-lg font-semibold text-black">Qualifications</div>
                        </div>
                    </a>

                    <a href="{{ route('salary') }}" class="card">
                        <div class="flex flex-col items-center">
                            <div class="icon bg-yellow-50 text-yellow-400"><i class="fas fa-wallet text-3xl"></i></div>
                            <div class="text-lg font-semibold text-black">Salary</div>
                        </div>
                    </a>

                    <a href="{{ route('job.index') }}" class="card">
                        <div class="flex flex-col items-center">
                            <div class="icon bg-red-50 text-red-400"><i class="fas fa-briefcase text-3xl"></i></div>
                            <div class="text-lg font-semibold text-black">Jobs</div>
                        </div>
                    </a>

                    <a href="{{ route('performance.index') }}" class="card">
                        <div class="flex flex-col items-center">
                            <div class="icon bg-pink-50 text-pink-400"><i class="fas fa-chart-line text-3xl"></i></div>
                            <div class="text-lg font-semibold text-black">Performance</div>
                        </div>
                    </a>

                    <a href="{{ route('employee_info.index') }}" class="card">
                        <div class="flex flex-col items-center">
                            <div class="icon bg-orange-50 text-orange-400"><i class="fas fa-user-plus text-3xl"></i>
                            </div>
                            <div class="text-lg font-semibold text-black">Assign</div>
                        </div>
                    </a>

                    <a href="{{ route('report') }}" class="card">
                        <div class="flex flex-col items-center">
                            <div class="icon bg-gray-50 text-gray-400"><i class="fas fa-file-alt text-3xl"></i></div>
                            <div class="text-lg font-semibold text-black">Reports</div>
                        </div>
                    </a>

                    <a href="{{ route('payroll.index') }}" class="card">
                        <div class="flex flex-col items-center">
                            <div class="icon bg-amber-50 text-amber-400"><i class="fas fa-money-bill-wave text-3xl"></i>
                            </div>
                            <div class="text-lg font-semibold text-black">Payroll</div>
                        </div>
                    </a>

                    <a href="{{ route('attendance.index') }}" class="card">
                        <div class="flex flex-col items-center">
                            <div class="icon bg-teal-50 text-teal-400"><i class="fas fa-calendar-check text-3xl"></i>
                            </div>
                            <div class="text-lg font-semibold text-black">Attendance</div>
                        </div>
                    </a>

                    <a href="{{ route('department.index') }}" class="card">
                        <div class="flex flex-col items-center">
                            <div class="icon bg-indigo-50 text-indigo-400"><i class="fas fa-sitemap text-3xl"></i></div>
                            <div class="text-lg font-semibold text-black">Department</div>
                        </div>
                    </a>

                    <a href="{{ route('leaves.index') }}" class="card">
                        <div class="flex flex-col items-center">
                            <div class="icon bg-green-50 text-green-400"><i class="fas fa-leaf text-3xl"></i></div>
                            <div class="text-lg font-semibold text-black">Leaves</div>
                        </div>
                    </a>
                </div>
                <!-- Divider -->
                <div class="my-8 border-t border-gray-300"></div>

                <!-- Stats Section -->
                <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4">
                    <!-- Stats Cards -->
                    <div class="card-stat">
                        <div class="icon bg-blue-50 text-blue-400"><i class="fas fa-users text-4xl"></i></div>
                        <div class="text-lg font-semibold text-black">Total Employees</div>
                        <div class="text-4xl font-extrabold text-blue-600">{{ $totalEmployees }}</div>
                    </div>

                    <div class="card-stat">
                        <div class="icon bg-purple-50 text-purple-400"><i class="fas fa-venus-mars text-4xl"></i></div>
                        <div class="text-lg font-semibold text-black">Gender Ratio</div>
                        <div class="text-2xl font-bold text-purple-600">Male: {{ $maleEmployees }} | Female:
                            {{ $femaleEmployees }}</div>
                        <div class="text-lg text-gray-500 mt-2">Ratio: {{ $genderRatio }}</div>
                    </div>

                    <div class="card-stat">
                        <div class="icon bg-indigo-50 text-indigo-400"><i class="fas fa-sitemap text-4xl"></i></div>
                        <div class="text-lg font-semibold text-black">Total Departments</div>
                        <div class="text-4xl font-extrabold text-indigo-600">{{ $totalDepartments }}</div>
                    </div>

                    <div class="card-stat">
                        <div class="icon bg-yellow-50 text-yellow-400"><i class="fas fa-leaf text-4xl"></i></div>
                        <div class="text-lg font-semibold text-black">Pending Leaves</div>
                        <div class="text-4xl font-extrabold text-yellow-600">{{ $pendingLeaves }}</div>
                    </div>

                    <div class="card-stat">
                        <div class="icon bg-green-50 text-green-400"><i class="fas fa-briefcase text-4xl"></i></div>
                        <div class="text-lg font-semibold text-black">Total Jobs</div>
                        <div class="text-4xl font-extrabold text-green-600">{{ $totalJobs }}</div>
                    </div>

                    <div class="card-stat">
                        <div class="icon bg-amber-50 text-amber-400"><i class="fas fa-money-bill-wave text-4xl"></i>
                        </div>
                        <div class="text-lg font-semibold text-black">Total Payroll</div>
                        <div class="text-4xl font-extrabold text-amber-600">{{ number_format($totalPayroll, 2) }}</div>
                    </div>

                    <div class="card-stat">
                        <div class="icon bg-teal-50 text-teal-400"><i class="fas fa-user-check text-4xl"></i></div>
                        <div class="text-lg font-semibold text-black">Active Employees</div>
                        <div class="text-4xl font-extrabold text-teal-600">{{ $activeEmployees }}</div>
                    </div>

                    <div class="card-stat">
                        <div class="icon bg-purple-50 text-purple-400"><i class="fas fa-chart-line text-4xl"></i>
                        </div>
                        <div class="text-lg font-semibold text-black">Average Performance</div>
                        <div class="text-4xl font-extrabold text-purple-600">{{ number_format($totalPerformance, 2) }}
                        </div>
                    </div>

                    <div class="card-stat">
                        <div class="icon bg-blue-50 text-blue-400"><i class="fas fa-calendar-check text-4xl"></i>
                        </div>
                        <div class="text-lg font-semibold text-black">Employees Logged In Today</div>
                        <div class="text-4xl font-extrabold text-blue-600">{{ $employeesLoggedInToday }}</div>
                    </div>
                </div>
            @endif
            <!-- User Section -->
            @if (Auth::user()->role === 'user')
                <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    <a href="{{ route('payrolluser.index') }}" class="card">
                        <div class="flex flex-col items-center">
                            <div class="icon bg-amber-50 text-amber-400"><i
                                    class="fas fa-money-bill-wave text-3xl"></i></div>
                            <div class="text-lg font-semibold text-black">Payroll</div>
                        </div>
                    </a>

                    <a href="{{ route('attendance.index') }}" class="card">
                        <div class="flex flex-col items-center">
                            <div class="icon bg-teal-50 text-teal-400"><i class="fas fa-calendar-check text-3xl"></i>
                            </div>
                            <div class="text-lg font-semibold text-black">Attendance</div>
                        </div>
                    </a>

                    <a href="{{ route('departmentuser.index') }}" class="card">
                        <div class="flex flex-col items-center">
                            <div class="icon bg-indigo-50 text-indigo-400"><i class="fas fa-sitemap text-3xl"></i>
                            </div>
                            <div class="text-lg font-semibold text-black">Department</div>
                        </div>
                    </a>

                    <a href="{{ route('leaveuser.index') }}" class="card">
                        <div class="flex flex-col items-center">
                            <div class="icon bg-green-50 text-green-400"><i class="fas fa-leaf text-3xl"></i></div>
                            <div class="text-lg font-semibold text-black">Leaves</div>
                        </div>
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- FontAwesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</x-app-layout>

<style>
    /* Card Style */
    .card {
        padding: 2rem;
        background-color: white;
        border-radius: 1rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .card-stat {
        padding: 2rem;
        background-color: white;
        border-radius: 1rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-stat:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .icon {
        width: 4rem;
        height: 4rem;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
    }
</style>
