<x-app-layout>
    <div class="max-w-4xl mx-auto mt-8 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
        <h1 class="text-3xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Update Certificate</h1>

        <form method="POST" action="{{ route('certificates.update', $certificate->certificate_id) }}" class="space-y-6">
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
                    <input type="search" x-on:click="open = !open" x-model="search" placeholder="Search Employee..."
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


            <!-- Certificate Name Input -->
            <div class="space-y-2">
                <label for="certificate_name"
                    class="block text-sm font-medium text-gray-600 dark:text-gray-300">Certificate Name</label>
                <input type="text" name="certificate_name" id="certificate_name"
                    value="{{ $certificate->certificate_name }}"
                    class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
                @error('certificate_name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Issued By Input -->
            <div class="space-y-2">
                <label for="issued_by" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Issued
                    By</label>
                <input type="text" name="issued_by" id="issued_by" value="{{ $certificate->issued_by }}"
                    class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500"
                    required>
                @error('issued_by')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Issue Date Input -->
            <div class="space-y-2">
                <label for="issue_date" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Issue
                    Date</label>
                <input type="date" name="issue_date" id="issue_date" value="{{ $certificate->issue_date }}"
                    class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500"
                    required>
                @error('issue_date')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Expiry Date Input -->
            <div class="space-y-2">
                <label for="expiry_date" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Expiry
                    Date</label>
                <input type="date" name="expiry_date" id="expiry_date" value="{{ $certificate->expiry_date }}"
                    class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500"
                    required>
                @error('expiry_date')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Buttons Section -->
            <div class="flex justify-between items-center">
                <!-- Back Button -->
                <a href="{{ url('/qualifications#Certificates') }}"
                    class="px-6 py-2 text-sm text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 transition">
                    Back to Certificates
                </a>

                <!-- Update Button -->
                <button type="submit"
                    class="px-6 py-2 text-sm text-white bg-green-500 rounded-lg hover:bg-green-600 focus:ring-2 focus:ring-green-400 transition">
                    Update Certificate
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
