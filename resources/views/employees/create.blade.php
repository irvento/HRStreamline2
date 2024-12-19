<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employee Inforamtion') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Name -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                            <input type="text" name="name" id="name" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                        </div>

                        <!-- First Name -->
                        <div>
                            <label for="employee_fname" class="block text-sm font-medium text-gray-700 dark:text-gray-300">First Name</label>
                            <input type="text" name="employee_fname" id="employee_fname" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                        </div>
                    </div>

                    <!-- Last Name -->
                    <div class="mt-4">
                        <label for="employee_lname" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Last Name</label>
                        <input type="text" name="employee_lname" id="employee_lname"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                    </div>

                    <!-- Middle Name -->
                    <div class="mt-4">
                        <label for="employee_mname" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Middle Name</label>
                        <input type="text" name="employee_mname" id="employee_mname"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                    </div>

                    <!-- Birthdate and Gender -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                        <div>
                            <label for="birthdate" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Birthdate</label>
                            <input type="date" name="birthdate" id="birthdate"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gender</label>
                            <select name="gender" id="gender"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <!-- Address Fields -->
                    <div class="mt-4">
                        <label for="address_line_1" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address Line 1</label>
                        <input type="text" name="address_line_1" id="address_line_1"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                    </div>

                    <div class="mt-4">
                        <label for="address_line_2" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address Line 2</label>
                        <input type="text" name="address_line_2" id="address_line_2"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700 dark:text-gray-300">City</label>
                            <input type="text" name="city" id="city"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label for="state" class="block text-sm font-medium text-gray-700 dark:text-gray-300">State</label>
                            <input type="text" name="state" id="state"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label for="postal_code" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Postal Code</label>
                            <input type="text" name="postal_code" id="postal_code"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                        </div>
                    </div>

                    <!-- Country -->
                    <div class="mt-4">
                        <label for="country" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Country</label>
                        <input type="text" name="country" id="country"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                    </div>

                    <!-- Contact and Image -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                        <div>
                            <label for="contact1" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone Number</label>
                            <input type="text" name="contact1" id="contact1"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Profile Image</label>
                            <input type="file" name="image" id="image"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 shadow-sm">
                        </div>
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
