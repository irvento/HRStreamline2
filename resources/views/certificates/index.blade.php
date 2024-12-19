<div class="">

    <div x-data="{ showAddModal: false, showDeleteModal: false, deleteUrl: '' }" class="mb-40">

        <!-- Button to trigger "Add New Certificate" modal -->
        <div class="flex justify-end mb-4">
            <button @click="showAddModal = true" type="button"
                class="cursor-pointer whitespace-nowrap rounded-md bg-black px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">
                Add New Certificate
            </button>
        </div>

        <!-- Add New Certificate Modal -->
        <div x-cloak x-show="showAddModal" x-transition.opacity.duration.300ms x-trap.inert.noscroll="showAddModal"
            @keydown.esc.window="showAddModal = false" @click.self="showAddModal = false"
            class="fixed inset-0 z-40 flex items-center justify-center bg-black/50 backdrop-blur-sm p-4" role="dialog"
            aria-modal="true" aria-labelledby="modalTitle">

            <!-- Modal Dialog -->
            <div x-show="showAddModal" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0"
                class="relative w-full max-w-lg rounded-xl bg-white shadow-xl dark:bg-gray-800 text-gray-700 dark:text-gray-300">

                <!-- Modal Header -->
                <div
                    class="flex items-center justify-between bg-gradient-to-r from-blue-500 to-blue-700 p-4 rounded-t-xl">
                    <h3 id="modalTitle" class="text-lg font-semibold text-white">Add New Certificate</h3>
                    <button @click="showAddModal = false" aria-label="close modal"
                        class="text-white hover:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Modal Form -->
                <form action="{{ route('certificates.store') }}" method="POST" class="p-6 space-y-4">
                    @csrf



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


                    <!-- Certificate Name -->
                    <div>
                        <label for="certificate_name" class="block text-sm font-medium">Certificate Name</label>
                        <input type="text" name="certificate_name" id="certificate_name"
                            class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 placeholder-gray-400 text-black"
                            placeholder="Enter certificate name" required>
                    </div>

                    <!-- Issued By -->
                    <div>
                        <label for="issued_by" class="block text-sm font-medium">Issued By</label>
                        <input type="text" name="issued_by" id="issued_by"
                            class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 placeholder-gray-400 text-black"
                            placeholder="Enter issuer's name" required>
                    </div>

                    <!-- Issue Date -->
                    <div>
                        <label for="issue_date" class="block text-sm font-medium">Issue Date</label>
                        <input type="date" name="issue_date" id="issue_date"
                            class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 placeholder-gray-400 text-black"
                            required>
                    </div>

                    <!-- Expiry Date -->
                    <div>
                        <label for="expiry_date" class="block text-sm font-medium">Expiry Date</label>
                        <input type="date" name="expiry_date" id="expiry_date"
                            class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 placeholder-gray-400 text-black"
                            required>
                    </div>

                    <!-- Footer Buttons -->
                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" @click="showAddModal = false"
                            class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 focus:ring-2 focus:ring-gray-400">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
                            Add Certificate
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table displaying certificate data -->
        <table
            class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md rounded-lg">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Certificate ID</th>
                    <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Employee</th>
                    <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Certificate Name</th>
                    <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Issued By</th>
                    <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Issue Date</th>
                    <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Expiry Date</th>
                    <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($certificates as $certificate)
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-300">{{ $certificate->certificate_id }}</td>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-300">
                            {{ $certificate->employee->employee_fname ?? 'N/A' }}
                            {{ $certificate->employee_lname ?? '' }}
                        </td>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-300">{{ $certificate->certificate_name }}
                        </td>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-300">{{ $certificate->issued_by }}</td>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-300">{{ $certificate->issue_date }}</td>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-300">{{ $certificate->expiry_date }}</td>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-300">
                            <div class="flex items-center gap-4">
                                <!-- View Button -->
                                <a href="{{ route('certificates.show', $certificate->certificate_id) }}"
                                    class="px-4 py-2 text-sm text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 transition"
                                    aria-label="View certificate">
                                    <i class="bi bi-eye"></i> View
                                </a>

                                <!-- Edit Button -->
                                <a href="{{ route('certificates.edit', $certificate->certificate_id) }}"
                                    class="px-4 py-2 text-sm text-white bg-green-500 rounded-lg hover:bg-green-600 transition"
                                    aria-label="Edit certificate">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>

                                <!-- Delete Button that triggers the "Delete Confirmation" Modal -->
                                <button
                                    @click="showDeleteModal = true; deleteUrl = '{{ route('certificates.destroy', $certificate->certificate_id) }}'"
                                    class="px-4 py-2 text-sm text-white bg-red-500 rounded-lg hover:bg-red-600 transition"
                                    aria-label="Delete certificate">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Delete Confirmation Modal -->
        <div x-show="showDeleteModal"
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" x-cloak>
            <div class="w-full max-w-sm p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Confirm Deletion</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Are you sure you want to delete this record?
                    This
                    action cannot be undone.</p>
                <div class="flex justify-end gap-4">
                    <button @click="showDeleteModal = false"
                        class="px-4 py-2 text-sm text-gray-800 bg-gray-200 rounded-lg hover:bg-gray-300 transition"
                        aria-label="Cancel deletion">
                        Cancel
                    </button>
                    <!-- The delete form is submitted with the deleteUrl -->
                    <form :action="deleteUrl" method="POST" class="inline" aria-label="Confirm deletion">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 text-sm text-white bg-red-500 rounded-lg hover:bg-red-600 transition">
                            Confirm Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
