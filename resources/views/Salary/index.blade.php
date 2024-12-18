<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Salaries') }}
        </h2>
    </x-slot>

    <div x-data="{ activeTab: window.location.hash ? window.location.hash : '#SalaryType', showModal: false }" class="mb-40">
        <!-- Tab Navigation -->
        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
            <template x-for="tab in ['#SalaryType', '#PaymentFrequencyType']" :key="tab">
                <li class="me-2">
                    <a href="#" @click.prevent="activeTab = tab; window.location.hash = tab" 
                        :aria-current="activeTab === tab ? 'page' : false"
                        :class="{
                            'text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500': activeTab === tab,
                            'hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300': activeTab !== tab
                        }"
                        class="inline-block p-4 rounded-t-lg">
                        <span x-text="tab.replace('#', '')"></span>
                    </a>
                </li>
            </template>
        </ul>

        <!-- Salary Type Tab Content -->
        <div class="mt-4">
            <div x-show="activeTab === '#SalaryType'" class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
                <div x-data="{ modalIsOpen: false }" class="flex justify-end mb-4">
                    <!-- Button to trigger modal -->
                    <button @click="modalIsOpen = true" type="button"
                        class="cursor-pointer whitespace-nowrap rounded-md bg-black px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">
                        Add New Salary
                    </button>
                    
                    <!-- Modal -->
                    <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.300ms
                        x-trap.inert.noscroll="modalIsOpen" @keydown.esc.window="modalIsOpen = false"
                        @click.self="modalIsOpen = false"
                        class="fixed inset-0 z-40 flex items-center justify-center bg-black/50 backdrop-blur-sm p-4"
                        role="dialog" aria-modal="true" aria-labelledby="modalTitle">
                        
                        <!-- Modal Dialog -->
                        <div x-show="modalIsOpen" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-8"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="relative w-full max-w-lg rounded-xl bg-white shadow-xl dark:bg-gray-800 text-gray-700 dark:text-gray-300">
                            
                            <!-- Modal Header -->
                            <div class="flex items-center justify-between bg-gradient-to-r from-blue-500 to-blue-700 p-4 rounded-t-xl">
                                <h3 id="modalTitle" class="text-lg font-semibold text-white">Add New Salary</h3>
                                <button @click="modalIsOpen = false" aria-label="close modal" class="text-white hover:text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Modal Form -->
                            <form action="{{ route('salaries.store') }}" method="POST" class="p-6 space-y-4">
                                @csrf
                                <!-- Salary Grade -->
                                <div>
                                    <label for="salary_grade" class="block text-sm font-medium">Salary Grade</label>
                                    <input type="text" name="salary_grade" id="salary_grade"
                                        class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 placeholder-gray-400 text-black"
                                        placeholder="Enter salary grade" required>
                                </div>

                                <!-- Salary Amount -->
                                <div>
                                    <label for="salary_amount" class="block text-sm font-medium">Salary Amount</label>
                                    <input type="number" name="salary_amount" id="salary_amount"
                                        class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 placeholder-gray-400 text-black"
                                        placeholder="Enter salary amount" required>
                                </div>

                                <!-- Payment Frequency Dropdown -->
                                <div>
                                    <label for="payment_frequency_id" class="block text-sm font-medium">Payment Frequency</label>
                                    <select name="payment_frequency_id" id="payment_frequency_id"
                                        class="mt-1 w-full rounded-lg border-gray-300 text-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                        @change="(e) => e.target.classList.add('text-black')" required>
                                        <option value="" disabled selected>Select Payment Frequency</option>
                                        @foreach ($paymentFrequencies as $frequency)
                                            <option value="{{ $frequency->payment_frequency_id }}" class="text-black">
                                                {{ $frequency->payment_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Footer Buttons -->
                                <div class="flex justify-end gap-3 mt-6">
                                    <button type="button" @click="modalIsOpen = false"
                                        class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 focus:ring-2 focus:ring-gray-400">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
                                        Add Salary
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Table displaying salary data -->
                @include('Salary.salary-type') <!-- Top Navigation -->
            </div>
        </div>

        <!-- Payment Type Tab Content -->
        <div class="mt-4">
            <div x-show="activeTab === '#PaymentFrequencyType'" class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
                @include('payment-frequency.index')
            </div>
        </div>
    </div>
</x-app-layout>
