<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-300 leading-tight">
            {{ __('Employee Information') }}
        </h2>
    </x-slot>


        <div class="w-full mt-8">
            <div class="bg-gray-800 shadow-md rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium text-gray-300">Employee Information List</h3>
                    <a href="{{ route('employee_info.create') }}" class="px-4 py-2 bg-blue-600 text-gray-100 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Add New Employee Info
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-700 rounded-lg shadow-sm">
                        <thead class="bg-gray-700">
                            <tr>
                                <th class="px-4 py-2 text-left text-gray-300 font-medium border-b border-gray-600">Employee ID</th>
                                <th class="px-4 py-2 text-left text-gray-300 font-medium border-b border-gray-600">Employee</th>
                                <th class="px-4 py-2 text-left text-gray-300 font-medium border-b border-gray-600">Department</th>
                                <th class="px-4 py-2 text-left text-gray-300 font-medium border-b border-gray-600">Job</th>
                                <!--<th class="px-4 py-2 text-left text-gray-300 font-medium border-b border-gray-600">Performance</th>-->
                                <th class="px-4 py-2 text-left text-gray-300 font-medium border-b border-gray-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employeeInfos as $employeeInfo)
                                <tr class="hover:bg-gray-700">
                                    <td class="px-4 py-2 border-b border-gray-600 text-gray-300">{{ $employeeInfo->employee->employee_id }}</td>
                                    <td class="px-4 py-2 border-b border-gray-600 text-gray-300">{{ $employeeInfo->employee->employee_fname }}</td>
                                    <td class="px-4 py-2 border-b border-gray-600 text-gray-300">{{ $employeeInfo->department->department_name}}</td>
                                    <td class="px-4 py-2 border-b border-gray-600 text-gray-300">{{ $employeeInfo->job->job_title }}</td>
                                  <!-- <td class="px-4 py-2 border-b border-gray-600 text-gray-300">{{ $employeeInfo->performance->performance_id ?? 'N/A' }}</td> -->
                                    <td class="px-4 py-2 border-b border-gray-600">
                                        <a href="{{ route('employee_info.edit', $employeeInfo->info_id) }}" class="px-3 py-1 bg-yellow-500 text-gray-100 rounded-md hover:bg-yellow-600">
                                            Edit
                                        </a>
                                        <form action="{{ route('employee_info.destroy', $employeeInfo->info_id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-600 text-gray-100 rounded-md hover:bg-red-700">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>

</x-app-layout>
