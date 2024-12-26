<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employee Information') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-8">
                <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Personal Details -->
                    <fieldset class="border border-gray-300 dark:border-gray-600 rounded-md p-4">
                        <legend class="text-lg font-medium text-gray-700 dark:text-gray-300 px-2">Personal Details
                        </legend>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <div>
                                <label for="employee_fname"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">First
                                    Name</label>
                                <input type="text" name="employee_fname" id="employee_fname" required
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                                @error('employee_fname')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="employee_mname"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Middle
                                    Name</label>
                                <input type="text" name="employee_mname" id="employee_mname"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                                @error('employee_mname')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <div>
                                <label for="employee_lname"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Last Name</label>
                                <input type="text" name="employee_lname" id="employee_lname"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                                @error('employee_lname')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="birthdate"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Birthdate</label>
                                <input type="date" name="birthdate" id="birthdate"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                                @error('birthdate')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <div>
                                <label for="gender"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gender</label>
                                <select name="gender" id="gender"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                                    <option value="">Select Gender</option>
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female
                                    </option>
                                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other
                                    </option>
                                </select>
                                @error('gender')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="contact1"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contact</label>
                                <input type="text" name="contact1" id="contact1" value="{{ old('contact1') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                                @error('contact1')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </fieldset>

                    <!-- Address -->
                    <fieldset class="border border-gray-300 dark:border-gray-600 rounded-md p-4 mt-6">
                        <legend class="text-lg font-medium text-gray-700 dark:text-gray-300 px-2">Address</legend>
                        <div class="mt-4">
                            <label for="address_line_1"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address Line
                                1</label>
                            <input type="text" name="address_line_1" id="address_line_1"
                                value="{{ old('address_line_1') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                            @error('address_line_1')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="address_line_2"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address Line
                                2</label>
                            <input type="text" name="address_line_2" id="address_line_2"
                                value="{{ old('address_line_2') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                            @error('address_line_2')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                            <div>
                                <label for="city"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">City</label>
                                <input type="text" name="city" id="city" value="{{ old('city') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                                @error('city')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="state"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">State</label>
                                <input type="text" name="state" id="state" value="{{ old('state') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                                @error('state')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="postal_code"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Postal
                                    Code</label>
                                <input type="text" name="postal_code" id="postal_code"
                                    value="{{ old('postal_code') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                                @error('postal_code')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="country"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Country</label>
                            <input type="text" name="country" id="country" value="{{ old('country') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                            @error('country')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </fieldset>

                    <!-- Job Details -->
                    <fieldset class="border border-gray-300 dark:border-gray-600 rounded-md p-4 mt-6">
                        <legend class="text-lg font-medium text-gray-700 dark:text-gray-300 px-2">Job Details</legend>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <div>
                                <label for="department_id"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Department</label>
                                <select name="department_id" id="department_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->department_id }}"
                                            {{ old('department_id') == $department->department_id ? 'selected' : '' }}>
                                            {{ $department->department_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="job_id"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Job
                                    Title</label>
                                <select name="job_id" id="job_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                                    @foreach ($jobs as $job)
                                        <option value="{{ $job->job_id }}"
                                            {{ old('job_id') == $job->job_id ? 'selected' : '' }}>
                                            {{ $job->job_title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('job_id')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </fieldset>

                    <!-- Image Upload -->
                    <div class="mt-6">
                        <label for="image"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Profile Image</label>
                        <input type="file" name="image" id="image"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                        @error('image')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button type="submit"
                            class="w-full px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Create Employee
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
