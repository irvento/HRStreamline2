<nav class="w-64 bg-gray-50 dark:bg-gray-900 border-r border-gray-200 dark:border-gray-700 flex flex-col shadow-lg">
    <!-- Logo Section -->
    <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex items-center space-x-4">
        <i class="fas fa-stream text-blue-500 text-2xl"></i>
        <span class="text-xl font-semibold text-gray-800 dark:text-gray-200">HR Streamline</span>
    </div>

    <!-- Navigation Links -->
    <ul class="flex-1 mt-8 space-y-4 px-6">
        <li>
            <a href="{{ route('rattendance') }}" 
               class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 transition-colors 
                      {{ request()->routeIs('rattendance') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-3 rounded-md">
                <i class="fas fa-calendar-check text-blue-500 text-xl {{ request()->routeIs('rattendance') ? 'text-blue-700' : '' }}"></i>
                <span class="font-medium">Attendance</span>
            </a>
        </li>
        <li>
            <a href="{{ route('rleaves') }}" 
               class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-green-500 dark:hover:text-green-400 transition-colors 
                      {{ request()->routeIs('rleaves') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-3 rounded-md">
                <i class="fas fa-leaf text-green-500 text-xl {{ request()->routeIs('rleaves') ? 'text-green-700' : '' }}"></i>
                <span class="font-medium">Leaves</span>
            </a>
        </li>
        <li>
            <a href="{{ route('remployee.directory') }}" 
               class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-purple-500 dark:hover:text-purple-400 transition-colors 
                      {{ request()->routeIs('remployee.directory') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-3 rounded-md">
                <i class="fas fa-users text-purple-500 text-xl {{ request()->routeIs('remployee.directory') ? 'text-purple-700' : '' }}"></i>
                <span class="font-medium">Employee Directory</span>
            </a>
        </li>
        <li>
            <a href="{{ route('rperformance') }}" 
               class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-red-500 dark:hover:text-red-400 transition-colors 
                      {{ request()->routeIs('rperformance') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-3 rounded-md">
                <i class="fas fa-chart-line text-red-500 text-xl {{ request()->routeIs('rperformance') ? 'text-red-700' : '' }}"></i>
                <span class="font-medium">Performance</span>
            </a>
        </li>
        <li>
            <a href="{{ route('rsalary.reports') }}" 
               class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-yellow-500 dark:hover:text-yellow-400 transition-colors 
                      {{ request()->routeIs('rsalary.reports') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-3 rounded-md">
                <i class="fas fa-wallet text-yellow-500 text-xl {{ request()->routeIs('rsalary.reports') ? 'text-yellow-700' : '' }}"></i>
                <span class="font-medium">Salary Reports</span>
            </a>
        </li>
        <li>
            <a href="{{ route('rdepartment.analysis') }}" 
               class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-teal-500 dark:hover:text-teal-400 transition-colors 
                      {{ request()->routeIs('rdepartment.analysis') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-3 rounded-md">
                <i class="fas fa-sitemap text-teal-500 text-xl {{ request()->routeIs('rdepartment.analysis') ? 'text-teal-700' : '' }}"></i>
                <span class="font-medium">Department Analysis</span>
            </a>
        </li>

        <!-- New Payroll Tab -->
        <li>
            <a href="{{ route('payroll.reports') }}" 
               class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-indigo-500 dark:hover:text-indigo-400 transition-colors 
                      {{ request()->routeIs('payroll.reports') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-3 rounded-md">
                <i class="fas fa-money-check-alt text-indigo-500 text-xl {{ request()->routeIs('payroll.reports') ? 'text-indigo-700' : '' }}"></i>
                <span class="font-medium">Payroll</span>
            </a>
        </li>
    </ul>
</nav>
