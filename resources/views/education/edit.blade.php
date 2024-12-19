<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-300 leading-tight">
            {{ __('Edit Education') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
                <form action="{{ route('education.update', $education->education_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Employee Selection -->
                    <div class="mb-6">
                        <label for="employee_id" class="block text-sm font-medium text-gray-300">Employee</label>
                        <div x-data="{
                            search: '',
                            open: false,
                            items: @js($employees),
                            get filteredItems() {
                                return this.items.filter(i =>
                                    `${i.employee_fname} ${i.employee_lname}`.toLowerCase().includes(this.search.toLowerCase())
                                )
                            }
                        }" class="relative w-full">
                            <input type="search" x-on:click="open = !open" x-model="search"
                                placeholder="Search Employee..."
                                class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 placeholder-gray-400 text-black">

                            <ul x-show="open" x-on:click.outside="open = false"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform scale-95"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-95"
                                class="absolute w-full mt-2 bg-white border rounded-lg shadow-lg max-h-60 overflow-auto z-10 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300">
                                <template x-for="item in filteredItems" :key="item.employee_id">
                                    <li @click="search = `${item.employee_fname} ${item.employee_lname}`; open = false;"
                                        class="cursor-pointer p-2 hover:bg-gray-200 dark:hover:bg-gray-700"
                                        x-text="`${item.employee_fname} ${item.employee_lname}`"></li>
                                </template>
                            </ul>
                            <input type="hidden" name="employee_id"
                                :value="filteredItems[0] ? filteredItems[0].employee_id : ''">
                        </div>
                        @error('employee_id')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Degree -->
                    <div class="mb-6">
                        <label for="degree" class="block text-sm font-medium text-gray-300">Degree</label>
                        <input type="text" name="degree" id="degree"
                            value="{{ old('degree', $education->degree) }}"
                            class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-500"
                            required>
                        @error('degree')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Field of Study -->
                    <div class="mb-6">
                        <label for="field_of_study" class="block text-sm font-medium text-gray-300">Field of
                            Study</label>
                        <input type="text" name="field_of_study" id="field_of_study"
                            value="{{ old('field_of_study', $education->field_of_study) }}"
                            class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-500"
                            required>
                        @error('field_of_study')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Institution Name -->
                    <div class="mb-6">
                        <label for="institution_name"
                            class="block text-sm font-medium text-gray-300">Institution</label>
                        <input type="text" name="institution_name" id="institution_name"
                            value="{{ old('institution_name', $education->institution_name) }}"
                            class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-500"
                            required>
                        @error('institution_name')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Start Date Input -->
                    <div class="space-y-2">
                        <label for="start_date" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Start
                            Date</label>
                        <input type="date" name="start_date" id="start_date" value="{{ $education->start_date }}"
                            class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('start_date')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- End Date Input -->
                    <div class="space-y-2">
                        <label for="end_date" class="block text-sm font-medium text-gray-600 dark:text-gray-300">End
                            Date</label>
                        <input type="date" name="end_date" id="end_date" value="{{ $education->end_date }}"
                            class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500">
                        @error('end_date')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>


                    <!-- Buttons Section -->
                    <div class="flex justify-between items-center">
                        <!-- Back Button -->
                        <a href="{{ url('/qualifications#Education') }}"
                            class="px-6 py-2 text-sm text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 transition">
                            Back to Education
                        </a>

                        <!-- Update Button -->
                        <button type="submit"
                            class="px-6 py-2 text-sm text-white bg-green-500 rounded-lg hover:bg-green-600 focus:ring-2 focus:ring-green-400 transition">
                            Update Education
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
