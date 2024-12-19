<nav class="w-64 bg-gray-50 dark:bg-gray-900 border-r border-gray-200 dark:border-gray-700 flex flex-col">
    <!-- Logo Section -->
    <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex items-center space-x-4">
        <span class="text-xl font-semibold text-gray-800 dark:text-gray-200">HR Streamline</span>
    </div>

    <!-- Navigation Links -->
    <ul class="flex-1 mt-8 space-y-4 px-6">
        <li>
            <a href="{{ route('rattendance') }}" 
               class="flex items-center space-x-3 text-gray-800 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 transition-colors 
                      {{ request()->routeIs('rattendance') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-2 rounded-md">
                <i class="fas fa-calendar-check text-blue-500 {{ request()->routeIs('rattendance') ? 'text-blue-700' : '' }}"></i>
                <span>Attendance</span>
            </a>
        </li>
        <li>
            <a href="{{ route('rleaves') }}" 
               class="flex items-center space-x-3 text-gray-800 dark:text-gray-200 hover:text-green-500 dark:hover:text-green-400 transition-colors 
                      {{ request()->routeIs('rleaves') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-2 rounded-md">
                <i class="fas fa-leaf text-green-500 {{ request()->routeIs('rleaves') ? 'text-green-700' : '' }}"></i>
                <span>Leaves</span>
            </a>
        </li>
        <li>
            <a href="{{ route('remployee.directory') }}" 
               class="flex items-center space-x-3 text-gray-800 dark:text-gray-200 hover:text-purple-500 dark:hover:text-purple-400 transition-colors 
                      {{ request()->routeIs('remployee.directory') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-2 rounded-md">
                <i class="fas fa-users text-purple-500 {{ request()->routeIs('remployee.directory') ? 'text-purple-700' : '' }}"></i>
                <span>Employee Directory</span>
            </a>
        </li>
        <li>
            <a href="{{ route('rperformance') }}" 
               class="flex items-center space-x-3 text-gray-800 dark:text-gray-200 hover:text-red-500 dark:hover:text-red-400 transition-colors 
                      {{ request()->routeIs('rperformance') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-2 rounded-md">
                <i class="fas fa-chart-line text-red-500 {{ request()->routeIs('rperformance') ? 'text-red-700' : '' }}"></i>
                <span>Performance</span>
            </a>
        </li>
        <li>
            <a href="{{ route('rsalary.reports') }}" 
               class="flex items-center space-x-3 text-gray-800 dark:text-gray-200 hover:text-yellow-500 dark:hover:text-yellow-400 transition-colors 
                      {{ request()->routeIs('rsalary.reports') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-2 rounded-md">
                <i class="fas fa-wallet text-yellow-500 {{ request()->routeIs('rsalary.reports') ? 'text-yellow-700' : '' }}"></i>
                <span>Salary Reports</span>
            </a>
        </li>
        <li>
            <a href="{{ route('rdepartment.analysis') }}" 
               class="flex items-center space-x-3 text-gray-800 dark:text-gray-200 hover:text-teal-500 dark:hover:text-teal-400 transition-colors 
                      {{ request()->routeIs('rdepartment.analysis') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-2 rounded-md">
                <i class="fas fa-sitemap text-teal-500 {{ request()->routeIs('rdepartment.analysis') ? 'text-teal-700' : '' }}"></i>
                <span>Department Analysis</span>
            </a>
        </li>
        {{-- <li>
            <a href="{{ route('rcustom.reports') }}" 
               class="flex items-center space-x-3 text-gray-800 dark:text-gray-200 hover:text-pink-500 dark:hover:text-pink-400 transition-colors 
                      {{ request()->routeIs('rcustom.reports') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-2 rounded-md">
                <i class="fas fa-file-alt text-pink-500 {{ request()->routeIs('rcustom.reports') ? 'text-pink-700' : '' }}"></i>
                <span>Custom Reports</span>
            </a>
        </li> --}}
    </ul>
</nav>
