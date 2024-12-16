<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('EMPLOYEE') }}
        </h2>
    </x-slot>

    <div x-data="{ selectedTab: 'info', showModal: false, deleteUrl: '' }" class="w-full mt-13">
        <div @keydown.right.prevent="$focus.wrap().next()" @keydown.left.prevent="$focus.wrap().previous()"
            class="flex gap-2 overflow-x-auto border-b border-neutral-300 dark:border-neutral-700" role="tablist"
            aria-label="tab options">
            <button @click="selectedTab = 'info'" :aria-selected="selectedTab === 'info'"
                :tabindex="selectedTab === 'info' ? '0' : '-1'"
                :class="selectedTab === 'info' ? 
                    'font-bold text-black border-b-2 border-black dark:border-white dark:text-white' :
                    'text-neutral-600 font-medium dark:text-neutral-300 dark:hover:border-b-neutral-300 dark:hover:text-white hover:border-b-2 hover:border-b-neutral-800 hover:text-neutral-900'"
                class="h-min px-4 py-2 text-sm" type="button" role="tab" aria-controls="tabpanelInfo">Personal
                Info</button>
            <button @click="selectedTab = 'qualifications'" :aria-selected="selectedTab === 'qualifications'"
                :tabindex="selectedTab === 'qualifications' ? '0' : '-1'"
                :class="selectedTab === 'qualifications' ? 
                    'font-bold text-black border-b-2 border-black dark:border-white dark:text-white' :
                    'text-neutral-600 font-medium dark:text-neutral-300 dark:hover:border-b-neutral-300 dark:hover:text-white hover:border-b-2 hover:border-b-neutral-800 hover:text-neutral-900'"
                class="h-min px-4 py-2 text-sm" type="button" role="tab"
                aria-controls="tabpanelQualifications">Qualifications</button>
        </div>
        <div class="px-2 py-4 text-neutral-600 dark:text-neutral-300">
            <div x-show="selectedTab === 'info'" id="tabpanelInfo" role="tabpanel" aria-label="info">
                <b><a href="#" class="underline">Personal Info</a></b> tab is selected

                <div class="mt-6 bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full table-auto text-gray-700 dark:text-gray-300">
                        <thead class="bg-gray-800 text-white dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">First Name</th>
                                <th class="px-4 py-2">Last Name</th>
                                <th class="px-4 py-2">Phone Number</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-100 dark:bg-gray-900">
                            @foreach ($employees as $employee)
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td class="px-4 py-2">{{ $employee->name }}</td>
                                    <td class="px-4 py-2">{{ $employee->employee_fname }}</td>
                                    <td class="px-4 py-2">{{ $employee->employee_lname }}</td>
                                    <td class="px-4 py-2">{{ $employee->phonenumber }}</td>
                                    <td class="px-4 py-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('employees.edit', $employee->employee_id) }}"
                                            class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">
                                            Edit
                                        </a>

                                        <!-- Delete Button -->
                                        <button @click="showModal = true; deleteUrl = '{{ route('employees.destroy', $employee->employee_id) }}';"
                                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div x-show="selectedTab === 'qualifications'" id="tabpanelQualifications" role="tabpanel"
                aria-label="qualifications">
                <b><a href="#" class="underline">Qualifications</a></b> tab is selected
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-96">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Delete Confirmation</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Are you sure you want to delete this record? This action cannot be undone.</p>
                <div class="flex justify-end gap-4">
                    <button @click="showModal = false" class=" bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-400">
                        Cancel
                    </button>
                    <form :action="deleteUrl" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
