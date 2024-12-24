<x-app-layout>
    <div class="flex items-center min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="container max-w-7xl px-6 mx-auto my-20">
            <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Employee-only Links -->

                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('qualifications.index') }}"
                        class="p-12 bg-white rounded-lg shadow-md hover:shadow-xl transition-transform transform hover:scale-105">
                        <div class="flex flex-col items-center">
                            <div
                                class="flex items-center justify-center w-20 h-20 rounded-full bg-emerald-50 text-emerald-400">
                                <i class="fas fa-certificate text-4xl"></i>
                            </div>
                            <div class="mt-4 text-center">
                                <div class="text-lg font-semibold text-black">Qualifications</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('salary') }}"
                        class="p-12 bg-white rounded-lg shadow-md hover:shadow-xl transition-transform transform hover:scale-105">
                        <div class="flex flex-col items-center">
                            <div
                                class="flex items-center justify-center w-20 h-20 rounded-full bg-yellow-50 text-yellow-400">
                                <i class="fas fa-wallet text-4xl"></i>
                            </div>
                            <div class="mt-4 text-center">
                                <div class="text-lg font-semibold text-black">Salary</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('job.index') }}"
                        class="p-12 bg-white rounded-lg shadow-md hover:shadow-xl transition-transform transform hover:scale-105">
                        <div class="flex flex-col items-center">
                            <div class="flex items-center justify-center w-20 h-20 rounded-full bg-red-50 text-red-400">
                                <i class="fas fa-briefcase text-4xl"></i>
                            </div>
                            <div class="mt-4 text-center">
                                <div class="text-lg font-semibold text-black">Jobs</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('performance.index') }}"
                        class="p-12 bg-white rounded-lg shadow-md hover:shadow-xl transition-transform transform hover:scale-105">
                        <div class="flex flex-col items-center">
                            <div
                                class="flex items-center justify-center w-20 h-20 rounded-full bg-pink-50 text-pink-400">
                                <i class="fas fa-chart-line text-4xl"></i>
                            </div>
                            <div class="mt-4 text-center">
                                <div class="text-lg font-semibold text-black">Performance</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('employee_info.index') }}"
                        class="p-12 bg-white rounded-lg shadow-md hover:shadow-xl transition-transform transform hover:scale-105">
                        <div class="flex flex-col items-center">
                            <div
                                class="flex items-center justify-center w-20 h-20 rounded-full bg-orange-50 text-orange-400">
                                <i class="fas fa-user-plus text-4xl"></i>
                            </div>
                            <div class="mt-4 text-center">
                                <div class="text-lg font-semibold text-black">Assign</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('report') }}"
                        class="p-12 bg-white rounded-lg shadow-md hover:shadow-xl transition-transform transform hover:scale-105">
                        <div class="flex flex-col items-center">
                            <div
                                class="flex items-center justify-center w-20 h-20 rounded-full bg-gray-50 text-gray-400">
                                <i class="fas fa-file-alt text-4xl"></i>
                            </div>
                            <div class="mt-4 text-center">
                                <div class="text-lg font-semibold text-black">Reports</div>
                            </div>
                        </div>
                    </a>
                @endif

                <!-- Other Buttons -->
                <a href="{{ route('payroll.index') }}"
                    class="p-12 bg-white rounded-lg shadow-md hover:shadow-xl transition-transform transform hover:scale-105">
                    <div class="flex flex-col items-center">
                        <div class="flex items-center justify-center w-20 h-20 rounded-full bg-amber-50 text-amber-400">
                            <i class="fas fa-money-bill-wave text-4xl"></i>
                        </div>
                        <div class="mt-4 text-center">
                            <div class="text-lg font-semibold text-black">Payroll</div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('attendance.index') }}"
                    class="p-12 bg-white rounded-lg shadow-md hover:shadow-xl transition-transform transform hover:scale-105">
                    <div class="flex flex-col items-center">
                        <div class="flex items-center justify-center w-20 h-20 rounded-full bg-teal-50 text-teal-400">
                            <i class="fas fa-calendar-check text-4xl"></i>
                        </div>
                        <div class="mt-4 text-center">
                            <div class="text-lg font-semibold text-black">Attendance</div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('department.index') }}"
                    class="p-12 bg-white rounded-lg shadow-md hover:shadow-xl transition-transform transform hover:scale-105">
                    <div class="flex flex-col items-center">
                        <div
                            class="flex items-center justify-center w-20 h-20 rounded-full bg-indigo-50 text-indigo-400">
                            <i class="fas fa-sitemap text-4xl"></i>
                        </div>
                        <div class="mt-4 text-center">
                            <div class="text-lg font-semibold text-black">Department</div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('leaves.index') }}"
                    class="p-12 bg-white rounded-lg shadow-md hover:shadow-xl transition-transform transform hover:scale-105">
                    <div class="flex flex-col items-center">
                        <div class="flex items-center justify-center w-20 h-20 rounded-full bg-green-50 text-green-400">
                            <i class="fas fa-leaf text-4xl"></i>
                        </div>
                        <div class="mt-4 text-center">
                            <div class="text-lg font-semibold text-black">Leaves</div>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</x-app-layout>
