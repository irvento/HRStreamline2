<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-300 leading-tight">
            {{ __('Edit Skill') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
                <form action="{{ route('skills.update', $skill->skill_id) }}" method="POST">
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

                    <!-- Skill Name -->
                    <div class="mb-6">
                        <label for="skill_name" class="block text-sm font-medium text-gray-300">Skill Name</label>
                        <input type="text" name="skill_name" id="skill_name"
                            value="{{ old('skill_name', $skill->skill_name) }}"
                            class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-500"
                            required>
                        @error('skill_name')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Proficiency Level -->
                    <div class="mb-6">
                        <label for="proficiency_level" class="block text-sm font-medium text-gray-300">Proficiency
                            Level</label>
                        <select name="proficiency_level" id="proficiency_level"
                            class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-500"
                            required>
                            <option value="beginner"
                                {{ old('proficiency_level', $skill->proficiency_level) == 'beginner' ? 'selected' : '' }}>
                                Beginner</option>
                            <option value="intermediate"
                                {{ old('proficiency_level', $skill->proficiency_level) == 'intermediate' ? 'selected' : '' }}>
                                Intermediate</option>
                            <option value="advanced"
                                {{ old('proficiency_level', $skill->proficiency_level) == 'advanced' ? 'selected' : '' }}>
                                Advanced</option>
                            <option value="expert"
                                {{ old('proficiency_level', $skill->proficiency_level) == 'expert' ? 'selected' : '' }}>
                                Expert</option>
                        </select>
                        @error('proficiency_level')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons Section -->
                    <div class="flex justify-between items-center">
                        <!-- Back Button -->
                        <a href="{{ url('/qualifications#Skills') }}"
                            class="px-6 py-2 text-sm text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 transition">
                            Back to Skills
                        </a>

                        <!-- Update Button -->
                        <button type="submit"
                            class="px-6 py-2 text-sm text-white bg-green-500 rounded-lg hover:bg-green-600 focus:ring-2 focus:ring-green-400 transition">
                            Update Skill
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
