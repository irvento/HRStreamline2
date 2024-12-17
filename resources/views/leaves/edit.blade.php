<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($leave) ? 'Edit Leave' : 'Create Leave' }}
        </h2>
    </x-slot>

    <form action="{{ isset($leave) ? route('leaves.update', $leave->leave_id) : route('leaves.store') }}" method="POST" class="mt-8">
        @csrf
        @if(isset($leave)) @method('PUT') @endif

        <label for="employee_id">Employee ID:</label>
        <input type="text" name="employee_id" id="employee_id" value="{{ $leave->employee_id ?? '' }}" required>

        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" id="start_date" value="{{ $leave->start_date ?? '' }}" required>

        <label for="end_date">End Date:</label>
        <input type="date" name="end_date" id="end_date" value="{{ $leave->end_date ?? '' }}" required>

        <label for="leave_status">Leave Status:</label>
        <input type="text" name="leave_status" id="leave_status" value="{{ $leave->leave_status ?? '' }}" required>

        <label for="remarks">Remarks:</label>
        <textarea name="remarks" id="remarks">{{ $leave->remarks ?? '' }}</textarea>

        <button type="submit" class="px-4 py-2 bg-primary-500 text-white rounded-lg">Save</button>
    </form>
</x-app-layout>
