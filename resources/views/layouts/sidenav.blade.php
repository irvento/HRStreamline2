<div class="sticky top-0 z-10 flex flex-col bg-white dark:bg-gray-800 h-screen w-64 shadow-lg">
    <!-- Logo and Header -->
    <div class="flex items-center px-6 py-4 bg-gray-50 dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700">
        <a href="{{ route('dashboard') }}" class="flex items-center">
            <img src="https://scontent.fceb2-2.fna.fbcdn.net/v/t1.15752-9/427939711_8231636590196311_7121832931467789543_n.jpg?stp=dst-jpg_s100x100_tt6&_nc_cat=110&ccb=1-7&_nc_sid=b70caf&_nc_eui2=AeH6zFiQiHmq_zzrerV5jH8uhAxL5eLlI4OEDEvl4uUjg8KRNU9tSTcOi2_KInJZKTUfxENhA4WzwF9tMCVlrvnH&_nc_ohc=4z6ZJeN9wIAQ7kNvgE9xWt1&_nc_zt=23&_nc_ht=scontent.fceb2-2.fna&oh=03_Q7cD1gFa9S49uK8wa0Kek5r0o2_ZUyQUqKvKmxE872otutEI4Q&oe=678B1E8C"
                alt="HRStreamline Logo" class="h-12 w-12 rounded-full object-cover" />
            <span class="ml-4 text-xl font-semibold text-gray-800 dark:text-gray-200">HRStreamline</span>
        </a>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 px-4 py-6">
        <ul class="space-y-2">
            <!-- Dashboard -->
            <li>
                <button onclick="location.href='{{ route('dashboard') }}'"
                    class="flex items-center gap-4 px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-gray-700 rounded-lg group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600 group-hover:text-blue-800 dark:text-blue-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    <span>{{ __('Dashboard') }}</span>
                </button>
            </li>

            <!-- Conditional Admin/Manager Link -->
            @if(Auth::user()->role === 'admin' || Auth::user()->role === 'manager')
            <li>
                <button onclick="location.href='{{ route('employees') }}'"
                    class="flex items-center gap-4 px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-gray-700 rounded-lg group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600 group-hover:text-blue-800 dark:text-blue-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 00-8 0v2m8-10a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span>{{ __('Employee') }}</span>
                </button>
            </li>
            @endif

            <!-- Other Links -->
            @foreach([
                ['route' => 'qualifications.index', 'label' => 'Qualifications', 'icon' => 'M19.5 12h-15'],
                ['route' => 'salary', 'label' => 'Salary', 'icon' => 'M12 8c-1.38 0-2.5-1.12-2.5-2.5S10.62 3 12 3s2.5 1.12 2.5 2.5S13.38 8 12 8z'],
                ['route' => 'leaves.index', 'label' => 'Leaves', 'icon' => 'M5 13l4 4L19 7'],
                ['route' => 'attendance.index', 'label' => 'Attendance', 'icon' => 'M8 7v10M16 7v10M3 12h18'],
                ['route' => 'job.index', 'label' => 'Jobs', 'icon' => 'M17 9V7a4 4 0 00-8 0v2M3 13h18'],
                ['route' => 'performance.index', 'label' => 'Performance', 'icon' => 'M12 8c-1.38 0-2.5-1.12-2.5-2.5S10.62 3 12 3s2.5 1.12 2.5 2.5S13.38 8 12 8z'],
                ['route' => 'department.index', 'label' => 'Department', 'icon' => 'M3 10h18M3 14h18M4 6h16M4 18h16'],
                ['route' => 'employee_info.index', 'label' => 'Assign', 'icon' => 'M9 12h6M12 9v6m-9 3h18'],
                ['route' => 'report', 'label' => 'Reports', 'icon' => 'M3 12h18M9 6v12M15 6v12']
            ] as $item)
            <li>
                <button onclick="location.href='{{ route($item['route']) }}'"
                    class="flex items-center gap-4 px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-gray-700 rounded-lg group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600 group-hover:text-blue-800 dark:text-blue-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                    </svg>
                    <span>{{ __($item['label']) }}</span>
                </button>
            </li>
            @endforeach
        </ul>
    </nav>
</div>
