<x-app-layout>
    <div class="flex items-center min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="container max-w-7xl px-6 mx-auto my-20">
            <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ([
        ['route' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'fas fa-tachometer-alt', 'color' => 'fuchsia'],
        ['route' => 'employees', 'label' => 'Employees', 'icon' => 'fas fa-users', 'color' => 'cyan'],
        ['route' => 'payroll.index', 'label' => 'Payroll', 'icon' => 'fas fa-money-bill-wave', 'color' => 'amber'],
        ['route' => 'qualifications.index', 'label' => 'Qualifications', 'icon' => 'fas fa-certificate', 'color' => 'emerald'],
        ['route' => 'salary', 'label' => 'Salary', 'icon' => 'fas fa-wallet', 'color' => 'yellow'],
        ['route' => 'leaves.index', 'label' => 'Leaves', 'icon' => 'fas fa-leaf', 'color' => 'green'],
        ['route' => 'attendance.index', 'label' => 'Attendance', 'icon' => 'fas fa-calendar-check', 'color' => 'teal'],
        ['route' => 'job.index', 'label' => 'Jobs', 'icon' => 'fas fa-briefcase', 'color' => 'red'],
        ['route' => 'performance.index', 'label' => 'Performance', 'icon' => 'fas fa-chart-line', 'color' => 'pink'],
        ['route' => 'department.index', 'label' => 'Department', 'icon' => 'fas fa-sitemap', 'color' => 'indigo'],
        ['route' => 'employee_info.index', 'label' => 'Assign', 'icon' => 'fas fa-user-plus', 'color' => 'orange'],
        ['route' => 'report', 'label' => 'Reports', 'icon' => 'fas fa-file-alt', 'color' => 'gray'],
    ] as $item)
                    <a href="{{ route($item['route']) }}"
                        class="p-12 bg-white rounded-lg shadow-md hover:shadow-xl transition-transform transform hover:scale-105">
                        <div class="flex flex-col items-center">
                            <div
                                class="flex items-center justify-center w-20 h-20 rounded-full bg-{{ $item['color'] }}-50 text-{{ $item['color'] }}-400">
                                <i class="{{ $item['icon'] }} text-4xl"></i>
                            </div>
                            <div class="mt-4 text-center">
                                <div class="text-lg font-semibold text-black">{{ $item['label'] }}</div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</x-app-layout>
