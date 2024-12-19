<div
class="rounded-r-[20px] sticky top-0 z-10 flex flex-col bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 h-screen w-64">
<div class="flex items-center py-4 px-4">
    <a href="{{ route('dashboard') }}">
        <img src="https://scontent.fceb2-2.fna.fbcdn.net/v/t1.15752-9/427939711_8231636590196311_7121832931467789543_n.jpg?stp=dst-jpg_s100x100_tt6&_nc_cat=110&ccb=1-7&_nc_sid=b70caf&_nc_eui2=AeH6zFiQiHmq_zzrerV5jH8uhAxL5eLlI4OEDEvl4uUjg8KRNU9tSTcOi2_KInJZKTUfxENhA4WzwF9tMCVlrvnH&_nc_ohc=4z6ZJeN9wIAQ7kNvgE9xWt1&_nc_zt=23&_nc_ht=scontent.fceb2-2.fna&oh=03_Q7cD1gFa9S49uK8wa0Kek5r0o2_ZUyQUqKvKmxE872otutEI4Q&oe=678B1E8C"
            alt="HRStreamline Logo" class="h-12 w-12 rounded-full object-cover" />
    </a>
    <span class="ms-4 text-2xl font-semibold text-gray-800 dark:text-gray-200">HRStreamline</span>
</div>

    <!-- Navigation Links -->
    <nav class="flex-1 px-2 py-4 space-y-2 mt-4 mr-1">
        <ul class="space-y-1 ml-5">
            <li>
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
            </li>
            <!-- Add more links as needed -->
            
            
            <!-- Show Employee Tab only if the user is admin -->
            @if(Auth::user()->role === 'admin' || Auth::user()->role === 'manager' )
                <li>
                    <x-nav-link :href="route('employees')" :active="request()->routeIs('employees')">
                        {{ __('Employee') }}
                    </x-nav-link>
                </li>
            @endif

            <li>
                <x-nav-link :href="route('salary')" :active="request()->routeIs('salary')">
                    {{ __('Salary') }}
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('leaves.index')" :active="request()->routeIs('leaves.index')">
                    {{ __('Leaves') }}
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('attendance.index')" :active="request()->routeIs('attendance.index')">
                    {{ __('Attendance') }}
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('job.index')" :active="request()->routeIs('job.index')">
                    {{ __('Jobs') }}
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('performance.index')" :active="request()->routeIs('performance.index')">
                    {{ __('Performance') }}
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('department.index')" :active="request()->routeIs('department.index')">
                    {{ __('Department') }}
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('employee_info.index')" :active="request()->routeIs('employee_info.index')">
                    {{ __('Assign') }}
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('report')" :active="request()->routeIs('report')">
                    {{ __('Reports') }}
                </x-nav-link>
            </li>
        </ul>
    </nav>
</div>
