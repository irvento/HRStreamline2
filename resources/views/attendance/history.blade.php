<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Attendance History') }}
        </h2>
    </x-slot>

    <div class="mt-8">
        @if($attendances->count() > 0)
            <table class="min-w-full bg-white dark:bg-gray-800 border text-white">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Date</th>
                        <th class="border px-4 py-2">Employee ID</th>
                        <th class="border px-4 py-2">Time In</th>
                        <th class="border px-4 py-2">Time Out</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attendances as $attendance)
                        <tr>
                            <td class="border px-4 py-2">{{ $attendance->attendance_date }}</td>
                            <td class="border px-4 py-2">{{ $attendance->employee_id }}</td>
                            <td class="border px-4 py-2">{{ $attendance->time_in }}</td>
                            <td class="border px-4 py-2">{{ $attendance->time_out ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-600">No attendance records found.</p>
        @endif
    </div>
</x-app-layout>
