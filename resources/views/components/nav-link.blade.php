<div class="sticky top-0 z-10 flex flex-col bg-white dark:bg-gray-800 h-screen w-64">
    <div class="flex items-center py-4 px-4">
        <a href="{{ route('dashboard') }}">
            <img src="https://scontent.fceb2-2.fna.fbcdn.net/v/t1.15752-9/427939711_8231636590196311_7121832931467789543_n.jpg?stp=dst-jpg_s100x100_tt6&_nc_cat=110&ccb=1-7&_nc_sid=b70caf&_nc_eui2=AeH6zFiQiHmq_zzrerV5jH8uhAxL5eLlI4OEDEvl4uUjg8KRNU9tSTcOi2_KInJZKTUfxENhA4WzwF9tMCVlrvnH&_nc_ohc=4z6ZJeN9wIAQ7kNvgE9xWt1&_nc_zt=23&_nc_ht=scontent.fceb2-2.fna&oh=03_Q7cD1gFa9S49uK8wa0Kek5r0o2_ZUyQUqKvKmxE872otutEI4Q&oe=678B1E8C"
                alt="HRStreamline Logo" class="h-12 w-12 rounded-full object-cover" />
        </a>
        <span class="ms-4 text-2xl font-semibold text-gray-800 dark:text-gray-200">HRStreamline</span>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 px-2 py-4 mt-4">
        <ul class="space-y-1">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-lg font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    {{ __('Dashboard') }}
                </a>
            </li>

            @if (Auth::user()->role === 'admin' || Auth::user()->role === 'manager')
                <li>
                    <a href="{{ route('employees') }}"
                        class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-lg font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 21v-2a4 4 0 00-8 0v2m8-10a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        {{ __('Employee') }}
                    </a>
                </li>
            @endif

            <li>
                <a href="{{ route('qualifications.index') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-lg font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                    </svg>
                    {{ __('Qualifications') }}
                </a>
            </li>

            <li>
                <a href="{{ route('salary') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-lg font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8c-1.38 0-2.5-1.12-2.5-2.5S10.62 3 12 3s2.5 1.12 2.5 2.5S13.38 8 12 8z" />
                    </svg>
                    {{ __('Salary') }}
                </a>
            </li>

            <li>
                <a href="{{ route('leaves.index') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-lg font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ __('Leaves') }}
                </a>
            </li>

            <li>
                <a href="{{ route('attendance.index') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-lg font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7v10M16 7v10M3 12h18" />
                    </svg>
                    {{ __('Attendance') }}
                </a>
            </li>

            <li>
                <a href="{{ route('job.index') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-lg font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a4 4 0 00-8 0v2M3 13h18" />
                    </svg>
                    {{ __('Jobs') }}
                </a>
            </li>

            <li>
                <a href="{{ route('performance.index') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-lg font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8c-1.38 0-2.5-1.12-2.5-2.5S10.62 3 12 3s2.5 1.12 2.5 2.5S13.38 8 12 8z" />
                    </svg>
                    {{ __('Performance') }}
                </a>
            </li>

            <li>
                <a href="{{ route('department.index') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-lg font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M3 14h18M4 6h16M4 18h16" />
                    </svg>
                    {{ __('Department') }}
                </a>
            </li>

            <li>
                <a href="{{ route('employee_info.index') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-lg font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6M12 9v6m-9 3h18" />
                    </svg>
                    {{ __('Assign') }}
                </a>
            </li>

            <li>
                <a href="{{ route('report') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-lg font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M3 14h18M4 6h16M4 18h16" />
                    </svg>
                    {{ __('Reports') }}
                </a>
            </li>
        </ul>
    </nav>
</div>
