<!-- resources/views/employees/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Employee') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
             <!-- Back Button -->
     <div class="mb-4">
        <a href="{{ url()->previous() }}"
            class="inline-flex items-center px-4 py-2 bg-gray-600 text-white font-medium rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-offset-gray-800">
            Back
        </a>
    </div>   
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form action="{{ route('employees.update', $employee->employee_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Use PUT for updating records -->
                
                <!-- Name Fields -->
                <div class="mb-4">
                    <label for="employee_fname" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">First Name</label>
                    <input type="text" id="employee_fname" name="employee_fname" value="{{ old('employee_fname', $employee->employee_fname) }}" 
                        class="mt-1 block w-full px-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-700 focus:ring focus:ring-primary-200" />
                    @error('employee_fname')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="employee_lname" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Last Name</label>
                    <input type="text" id="employee_lname" name="employee_lname" value="{{ old('employee_lname', $employee->employee_lname) }}" 
                        class="mt-1 block w-full px-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-700 focus:ring focus:ring-primary-200" />
                    @error('employee_lname')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="contact1" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Contact</label>
                    <input type="text" id="contact1" name="contact1" value="{{ old('contact1', $employee->contact1) }}" 
                        class="mt-1 block w-full px-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-700 focus:ring focus:ring-primary-200" />
                    @error('contact1')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Address Fields -->
                <div class="mb-4">
                    <label for="address_line_1" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Address Line 1</label>
                    <input type="text" id="address_line_1" name="address_line_1" value="{{ old('address_line_1', $employee->address_line_1) }}" 
                        class="mt-1 block w-full px-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-700 focus:ring focus:ring-primary-200" />
                    @error('address_line_1')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="address_line_2" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Address Line 2</label>
                    <input type="text" id="address_line_2" name="address_line_2" value="{{ old('address_line_2', $employee->address_line_2) }}" 
                        class="mt-1 block w-full px-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-700 focus:ring focus:ring-primary-200" />
                    @error('address_line_2')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="city" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">City</label>
                    <input type="text" id="city" name="city" value="{{ old('city', $employee->city) }}" 
                        class="mt-1 block w-full px-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-700 focus:ring focus:ring-primary-200" />
                    @error('city')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="state" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">State</label>
                    <input type="text" id="state" name="state" value="{{ old('state', $employee->state) }}" 
                        class="mt-1 block w-full px-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-700 focus:ring focus:ring-primary-200" />
                    @error('state')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="postal_code" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Postal Code</label>
                    <input type="text" id="postal_code" name="postal_code" value="{{ old('postal_code', $employee->postal_code) }}" 
                        class="mt-1 block w-full px-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-700 focus:ring focus:ring-primary-200" />
                    @error('postal_code')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="country" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Country</label>
                    <input type="text" id="country" name="country" value="{{ old('country', $employee->country) }}" 
                        class="mt-1 block w-full px-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-700 focus:ring focus:ring-primary-200" />
                    @error('country')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="birthdate" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Birthdate</label>
                    <input type="date" id="birthdate" name="birthdate" value="{{ old('birthdate', $employee->birthdate) }}" 
                        class="mt-1 block w-full px-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-700 focus:ring focus:ring-primary-200" />
                    @error('birthdate')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="gender" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Gender</label>
                    <select id="gender" name="gender" 
                        class="mt-1 block w-full px-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-700 focus:ring focus:ring-primary-200">
                        <option value="Male" {{ old('gender', $employee->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender', $employee->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other" {{ old('gender', $employee->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('gender')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Image Upload -->
                <div class="mb-4">
                    <label for="imagePath" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Image</label>
                    <input type="file" id="imagePath" name="imagePath" 
                        class="mt-1 block w-full px-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-700 focus:ring focus:ring-primary-200" />
                    <p class="text-sm text-gray-500 dark:text-gray-400">Leave empty if you don't want to change the image.</p>
                    @error('imagePath')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-6">
                    <button type="submit" class="px-6 py-2 bg-primary-500 text-white rounded-lg hover:bg-primary-600 transition">Update Employee</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
