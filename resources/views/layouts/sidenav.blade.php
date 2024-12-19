<nav class="w-64 bg-gray-50 dark:bg-gray-900 border-r border-gray-200 dark:border-gray-700 flex flex-col shadow-lg">
    <!-- Logo Section -->
    <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex items-center space-x-4">
        <img src="https://scontent.fceb2-2.fna.fbcdn.net/v/t1.15752-9/427939711_8231636590196311_7121832931467789543_n.jpg?stp=dst-jpg_s100x100_tt6&_nc_cat=110&ccb=1-7&_nc_sid=b70caf&_nc_eui2=AeH6zFiQiHmq_zzrerV5jH8uhAxL5eLlI4OEDEvl4uUjg8KRNU9tSTcOi2_KInJZKTUfxENhA4WzwF9tMCVlrvnH&_nc_ohc=4z6ZJeN9wIAQ7kNvgE9xWt1&_nc_zt=23&_nc_ht=scontent.fceb2-2.fna&oh=03_Q7cD1gFa9S49uK8wa0Kek5r0o2_ZUyQUqKvKmxE872otutEI4Q&oe=678B1E8C" 
             alt="HRStreamline Logo" class="h-12 w-12 rounded-full object-cover" />
        <span class="text-xl font-semibold text-gray-800 dark:text-gray-200">HRStreamline</span>
    </div>

    <!-- Navigation Links -->
    <ul class="flex-1 mt-8 space-y-4 px-6">
        <li>
            <a href="{{ route('dashboard') }}" 
               class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 transition-colors 
                      {{ request()->routeIs('dashboard') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-3 rounded-md">
                <i class="fas fa-tachometer-alt text-blue-500 text-xl {{ request()->routeIs('dashboard') ? 'text-blue-700' : '' }}"></i>
                <span class="font-medium">Dashboard</span>
            </a>
        </li>

        <!-- Conditional Admin/Manager Link -->
        @if(Auth::user()->role === 'admin' || Auth::user()->role === 'manager')
        <li>
            <a href="{{ route('employees') }}" 
               class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-purple-500 dark:hover:text-purple-400 transition-colors 
                      {{ request()->routeIs('employees') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-3 rounded-md">
                <i class="fas fa-users text-purple-500 text-xl {{ request()->routeIs('employees') ? 'text-purple-700' : '' }}"></i>
                <span class="font-medium">Employees</span>
            </a>
        </li>
        @endif

        <!-- Payroll Link -->
        <li>
            <a href="{{ route('payroll.index') }}" 
               class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-teal-500 dark:hover:text-teal-400 transition-colors 
                      {{ request()->routeIs('payroll.index') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-3 rounded-md">
                <i class="fas fa-money-bill-wave text-teal-500 text-xl {{ request()->routeIs('payroll.index') ? 'text-teal-700' : '' }}"></i>
                <span class="font-medium">Payroll</span>
            </a>
        </li>

        <!-- Other Links -->
        @foreach([
            ['route' => 'qualifications.index', 'label' => 'Qualifications', 'icon' => 'fas fa-certificate', 'color' => 'blue'],
            ['route' => 'salary', 'label' => 'Salary', 'icon' => 'fas fa-wallet', 'color' => 'yellow'],
            ['route' => 'leaves.index', 'label' => 'Leaves', 'icon' => 'fas fa-leaf', 'color' => 'green'],
            ['route' => 'attendance.index', 'label' => 'Attendance', 'icon' => 'fas fa-calendar-check', 'color' => 'teal'],
            ['route' => 'job.index', 'label' => 'Jobs', 'icon' => 'fas fa-briefcase', 'color' => 'red'],
            ['route' => 'performance.index', 'label' => 'Performance', 'icon' => 'fas fa-chart-line', 'color' => 'pink'],
            ['route' => 'department.index', 'label' => 'Department', 'icon' => 'fas fa-sitemap', 'color' => 'indigo'],
            ['route' => 'employee_info.index', 'label' => 'Assign', 'icon' => 'fas fa-user-plus', 'color' => 'orange'],
            ['route' => 'report', 'label' => 'Reports', 'icon' => 'fas fa-file-alt', 'color' => 'gray']
        ] as $item)
        <li>
            <a href="{{ route($item['route']) }}" 
               class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-{{ $item['color'] }}-500 dark:hover:text-{{ $item['color'] }}-400 transition-colors 
                      {{ request()->routeIs($item['route']) ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-3 rounded-md">
                <i class="{{ $item['icon'] }} text-xl {{ request()->routeIs($item['route']) ? 'text-' . $item['color'] . '-700' : '' }}"></i>
                <span class="font-medium">{{ __($item['label']) }}</span>
            </a>
        </li>
        @endforeach
    </ul>
</nav>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
