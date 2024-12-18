    <div x-data="{ modalIsOpen: false, showModal: false, deleteUrl: '' }" class="container mx-auto p-6">
        <!-- Button to trigger modal -->
        <div class="flex justify-end mb-4">
            <button @click="modalIsOpen = true" type="button"
                class="cursor-pointer whitespace-nowrap rounded-md bg-black px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">
                Add New Payment Frequency
            </button>
        </div>

        <!-- Modal for adding a new Payment Frequency -->
        <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.300ms x-trap.inert.noscroll="modalIsOpen"
            @keydown.esc.window="modalIsOpen = false" @click.self="modalIsOpen = false"
            class="fixed inset-0 z-40 flex items-center justify-center bg-black/50 backdrop-blur-sm p-4" role="dialog"
            aria-modal="true" aria-labelledby="modalTitle">

            <div x-show="modalIsOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0"
                class="relative w-full max-w-lg rounded-xl bg-white shadow-xl dark:bg-gray-800 text-gray-700 dark:text-gray-300">

                <!-- Header -->
                <div
                    class="flex items-center justify-between bg-gradient-to-r from-blue-500 to-blue-700 p-4 rounded-t-xl">
                    <h3 id="modalTitle" class="text-lg font-semibold text-white">Add New Payment Frequency</h3>
                    <button @click="modalIsOpen = false" aria-label="close modal"
                        class="text-white hover:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Form -->
                <form action="{{ route('payment-frequency.store') }}" method="POST" class="p-6 space-y-4">
                    @csrf
                    <!-- Payment Frequency Name -->
                    <div>
                        <label for="payment_name" class="block text-sm font-medium">Payment Frequency Name</label>
                        <input type="text" name="payment_name" id="payment_name"
                            class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 placeholder-gray-400 text-black"
                            placeholder="Enter payment frequency name" required>
                    </div>

                    <!-- Footer Buttons -->
                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" @click="modalIsOpen = false"
                            class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 focus:ring-2 focus:ring-gray-400">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
                            Add Payment Frequency
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table displaying payment frequency data -->
        <table
            class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md rounded-lg">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Payment Frequency ID</th>
                    <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Payment Name</th>
                    <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paymentFrequencies as $paymentFrequency)
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-300">
                            {{ $paymentFrequency->payment_frequency_id }}</td>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-300">{{ $paymentFrequency->payment_name }}
                        </td>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-300">
                            <div class="flex items-center gap-4">
                                <!-- View Button -->
                                <a href="{{ route('payment-frequency.show', $paymentFrequency->payment_frequency_id) }}"
                                    class="px-4 py-2 text-sm text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 transition">
                                    <i class="bi bi-eye"></i> View
                                </a>
                                <!-- Edit Button -->
                                <a href="{{ route('payment-frequency.edit', $paymentFrequency->payment_frequency_id) }}"
                                    class="px-4 py-2 text-sm text-white bg-green-500 rounded-lg hover:bg-green-600 transition">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>

                                <!-- Delete Button that triggers the Modal -->
                                <button
                                    @click="showModal = true; deleteUrl = '{{ route('payment-frequency.destroy', $paymentFrequency->payment_frequency_id) }}'"
                                    class="px-4 py-2 text-sm text-white bg-red-500 rounded-lg hover:bg-red-600 transition">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Delete Confirmation Modal -->
        <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
            x-cloak>
            <div class="w-full max-w-sm p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Confirm Deletion</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Are you sure you want to delete this record?
                    This action cannot be undone.</p>
                <div class="flex justify-end gap-4">
                    <button @click="showModal = false"
                        class="px-4 py-2 text-sm text-gray-800 bg-gray-200 rounded-lg hover:bg-gray-300 transition">
                        Cancel
                    </button>
                    <!-- The delete form is submitted with the deleteUrl -->
                    <form :action="deleteUrl" method="POST" class="inline">
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
