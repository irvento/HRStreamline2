<nav class="w-64 bg-gray-50 dark:bg-gray-900 border-r border-gray-200 dark:border-gray-700 flex flex-col shadow-lg">
    <!-- Logo Section -->
    <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex items-center space-x-4">
        <img src="https://scontent.fceb2-2.fna.fbcdn.net/v/t1.15752-9/427939711_8231636590196311_7121832931467789543_n.jpg?stp=dst-jpg_s100x100_tt6&_nc_cat=110&ccb=1-7&_nc_sid=b70caf&_nc_eui2=AeH6zFiQiHmq_zzrerV5jH8uhAxL5eLlI4OEDEvl4uUjg8KRNU9tSTcOi2_KInJZKTUfxENhA4WzwF9tMCVlrvnH&_nc_ohc=4z6ZJeN9wIAQ7kNvgE9xWt1&_nc_zt=23&_nc_ht=scontent.fceb2-2.fna&oh=03_Q7cD1gFa9S49uK8wa0Kek5r0o2_ZUyQUqKvKmxE872otutEI4Q&oe=678B1E8C"
            alt="HRStreamline Logo" class="h-12 w-12 rounded-full object-cover" />
        <span class="text-xl font-semibold text-gray-800 dark:text-gray-200">HRStreamline</span>
    </div>

    <!-- Navigation Links -->
    <ul class="flex-1 mt-8 space-y-4 px-6">
        <!-- Dashboard Link -->
        <li>
            <a href="{{ route('dashboard') }}"
                class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 transition-colors 
                      {{ request()->routeIs('dashboard') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-3 rounded-md">
                <i
                    class="fas fa-tachometer-alt text-blue-500 text-xl {{ request()->routeIs('dashboard') ? 'text-blue-700' : '' }}"></i>
                <span class="font-medium">Dashboard</span>
            </a>
        </li>



        <!-- Conditional Admin/Manager Link -->
        @if (Auth::user()->role === 'admin')
            <li>
                <a href="{{ route('employees') }}"
                    class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-purple-500 dark:hover:text-purple-400 transition-colors 
                      {{ request()->routeIs('employees') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-3 rounded-md">
                    <i
                        class="fas fa-users text-purple-500 text-xl {{ request()->routeIs('employees') ? 'text-purple-700' : '' }}"></i>
                    <span class="font-medium">Employees</span>
                </a>
            </li>
            <li>
                <a href="{{ route('qualifications.index') }}"
                    class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 transition-colors 
                      {{ request()->routeIs('qualifications.index') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-3 rounded-md">
                    <i
                        class="fas fa-certificate text-blue-500 text-xl {{ request()->routeIs('qualifications.index') ? 'text-blue-700' : '' }}"></i>
                    <span class="font-medium">Qualifications</span>
                </a>
            </li>
            <!-- Payroll Link -->
            <li>
                <a href="{{ route('payroll.index') }}"
                    class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-teal-500 dark:hover:text-teal-400 transition-colors 
                              {{ request()->routeIs('payroll.index') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
                       px-4 py-3 rounded-md">
                    <i
                        class="fas fa-money-bill-wave text-teal-500 text-xl {{ request()->routeIs('payroll.index') ? 'text-teal-700' : '' }}"></i>
                    <span class="font-medium">Payroll</span>
                </a>
            </li>
            <li>
                <a href="{{ route('salary') }}"
                    class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-yellow-500 dark:hover:text-yellow-400 transition-colors 
                      {{ request()->routeIs('salary') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-3 rounded-md">
                    <i
                        class="fas fa-wallet text-yellow-500 text-xl {{ request()->routeIs('salary') ? 'text-yellow-700' : '' }}"></i>
                    <span class="font-medium">Salary</span>
                </a>
            </li>
            <li>
                <a href="{{ route('job.index') }}"
                    class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-red-500 dark:hover:text-red-400 transition-colors 
                      {{ request()->routeIs('job.index') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-3 rounded-md">
                    <i
                        class="fas fa-briefcase text-red-500 text-xl {{ request()->routeIs('job.index') ? 'text-red-700' : '' }}"></i>
                    <span class="font-medium">Jobs</span>
                </a>
            </li>
            <li>
                <a href="{{ route('performance.index') }}"
                    class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-pink-500 dark:hover:text-pink-400 transition-colors 
                      {{ request()->routeIs('performance.index') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-3 rounded-md">
                    <i
                        class="fas fa-chart-line text-pink-500 text-xl {{ request()->routeIs('performance.index') ? 'text-pink-700' : '' }}"></i>
                    <span class="font-medium">Performance</span>
                </a>
            </li>
            <li>
                <a href="{{ route('employee_info.index') }}"
                    class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-orange-500 dark:hover:text-orange-400 transition-colors 
                      {{ request()->routeIs('employee_info.index') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-3 rounded-md">
                    <i
                        class="fas fa-user-plus text-orange-500 text-xl {{ request()->routeIs('employee_info.index') ? 'text-orange-700' : '' }}"></i>
                    <span class="font-medium">Assign</span>
                </a>
            </li>
            <li>
                <a href="{{ route('report') }}"
                    class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-gray-500 dark:hover:text-gray-400 transition-colors 
                      {{ request()->routeIs('report') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-3 rounded-md">
                    <i
                        class="fas fa-file-alt text-gray-500 text-xl {{ request()->routeIs('report') ? 'text-gray-700' : '' }}"></i>
                    <span class="font-medium">Reports</span>
                </a>
            </li>
            <li>
                <a href="{{ route('leaves.index') }}"
                    class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-green-500 dark:hover:text-green-400 transition-colors 
                          {{ request()->routeIs('leaves.index') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
                   px-4 py-3 rounded-md">
                    <i
                        class="fas fa-leaf text-green-500 text-xl {{ request()->routeIs('leaves.index') ? 'text-green-700' : '' }}"></i>
                    <span class="font-medium">Leaves</span>
                </a>
            </li>
            <li>
                <a href="{{ route('attendance.index') }}"
                    class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-teal-500 dark:hover:text-teal-400 transition-colors 
                          {{ request()->routeIs('attendance.index') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
                   px-4 py-3 rounded-md">
                    <i
                        class="fas fa-calendar-check text-teal-500 text-xl {{ request()->routeIs('attendance.index') ? 'text-teal-700' : '' }}"></i>
                    <span class="font-medium">Attendance</span>
                </a>
            </li>
            <li>
                <a href="{{ route('department.index') }}"
                    class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-indigo-500 dark:hover:text-indigo-400 transition-colors 
                          {{ request()->routeIs('department.index') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
                   px-4 py-3 rounded-md">
                    <i
                        class="fas fa-sitemap text-indigo-500 text-xl {{ request()->routeIs('department.index') ? 'text-indigo-700' : '' }}"></i>
                    <span class="font-medium">Department</span>
                </a>
            </li>
        @endif

            @if (Auth::user()->role === 'user')
                
            
        <!-- Payroll Link -->
        <li>
            <a href="{{ route('payrolluser.index') }}"
                class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-teal-500 dark:hover:text-teal-400 transition-colors 
                              {{ request()->routeIs('payrolluser.index') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
                       px-4 py-3 rounded-md">
                <i
                    class="fas fa-money-bill-wave text-teal-500 text-xl {{ request()->routeIs('payrolluser.index') ? 'text-teal-700' : '' }}"></i>
                <span class="font-medium">Payroll</span>
            </a>
        </li>
        <li>
            <a href="{{ route('leavesuser.index') }}"
                class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-green-500 dark:hover:text-green-400 transition-colors 
                      {{ request()->routeIs('leavesuser.index') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-3 rounded-md">
                <i
                    class="fas fa-leaf text-green-500 text-xl {{ request()->routeIs('leavesuser.index') ? 'text-green-700' : '' }}"></i>
                <span class="font-medium">Leaves</span>
            </a>
        </li>
        <li>
            <a href="{{ route('attendance.index') }}"
                class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-teal-500 dark:hover:text-teal-400 transition-colors 
                      {{ request()->routeIs('attendance.index') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-3 rounded-md">
                <i
                    class="fas fa-calendar-check text-teal-500 text-xl {{ request()->routeIs('attendance.index') ? 'text-teal-700' : '' }}"></i>
                <span class="font-medium">Attendance</span>
            </a>
        </li>
        <li>
            <a href="{{ route('departmentuser.index') }}"
                class="flex items-center space-x-4 text-gray-800 dark:text-gray-200 hover:text-indigo-500 dark:hover:text-indigo-400 transition-colors 
                      {{ request()->routeIs('departmentuser.index') ? 'bg-gray-200 dark:bg-gray-700' : '' }} 
               px-4 py-3 rounded-md">
                <i
                    class="fas fa-sitemap text-indigo-500 text-xl {{ request()->routeIs('departmentuser.index') ? 'text-indigo-700' : '' }}"></i>
                <span class="font-medium">Department</span>
            </a>
        </li>
        @endif
    </ul>
</nav>

<!-- Font Awesome CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
