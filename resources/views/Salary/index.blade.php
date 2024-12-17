<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Salaries') }}
        </h2>
    </x-slot>
  
   
    <div x-data="{ activeTab: 'Salary Type', showModal: false }" class="mb-40">
       <!-- Tab Navigation -->
        <ul
            class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
            <template x-for="tab in ['Salary Type', 'Payment Type', 'Settings', 'Contacts']" :key="tab">
                <li class="me-2">
                    <a href="#" @click.prevent="activeTab = tab" :aria-current="activeTab === tab ? 'page' : false"
                        :class="{
                            'text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500': activeTab ===
                                tab,
                            'hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300': activeTab !==
                                tab
                        }"
                        class="inline-block p-4 rounded-t-lg">
                        <span x-text="tab"></span>
                    </a>
                </li>
            </template>
        </ul>
     <!-- Salary Type Tab Content -->
        <div class="mt-4">
       
            <div x-show="activeTab === 'Salary Type'" class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow">

                <div x-data="{ modalIsOpen: false }" class="flex justify-end mb-4">
                    <!-- Button to trigger modal -->
                    <button @click="modalIsOpen = true" type="button"
                        class="cursor-pointer whitespace-nowrap rounded-md bg-black px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">
                        Add New Salary
                    </button>
                    <!-- Modal -->
                    <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms
                        x-trap.inert.noscroll="modalIsOpen" @keydown.esc.window="modalIsOpen = false"
                        @click.self="modalIsOpen = false"
                        class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8"
                        role="dialog" aria-modal="true" aria-labelledby="modalTitle">

                        <!-- Modal Dialog -->
                        <div x-show="modalIsOpen"
                            x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                            x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
                            class="flex max-w-lg flex-col gap-4 overflow-hidden rounded-md border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">

                            <!-- Dialog Header -->
                            <div
                                class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                                <h3 id="modalTitle"
                                    class="font-semibold tracking-wide text-neutral-900 dark:text-white">Add New Salary
                                </h3>
                                <button @click="modalIsOpen = false" aria-label="close modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                        stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Form to Add Salary -->
                            <form action="{{ route('salaries.store') }}" method="POST">
                                @csrf
                                <div class="mt-4">
                                    <label for="salary_grade" class="block text-gray-700 dark:text-gray-300">Salary
                                        Grade</label>
                                    <input type="text" name="salary_grade" id="salary_grade"
                                        class="w-full p-2 mt-2 border border-gray-300 dark:border-gray-600 rounded-md"
                                        required>
                                </div>
                                <div class="mt-4">
                                    <label for="salary_amount" class="block text-gray-700 dark:text-gray-300">Salary
                                        Amount</label>
                                    <input type="number" name="salary_amount" id="salary_amount"
                                        class="w-full p-2 mt-2 border border-gray-300 dark:border-gray-600 rounded-md"
                                        required>
                                </div>
                                <div class="mt-4">
                                    <label for="payment_frequency_id"
                                        class="block text-gray-700 dark:text-gray-300">Payment Frequency ID</label>
                                    <input type="text" name="payment_frequency_id" id="payment_frequency_id"
                                        class="w-full p-2 mt-2 border border-gray-300 dark:border-gray-600 rounded-md"
                                        required>
                                </div>
                                <div class="mt-6 text-right">
                                    <button type="submit"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Add
                                        Salary</button>
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

            <div x-show="activeTab === 'Payment Type'" class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow">

                testtest
            </div>

        </div>


    </div>

</x-app-layout>
