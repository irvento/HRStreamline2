<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Qualifications') }}
        </h2>
    </x-slot>

    <div x-data="{ activeTab: window.location.hash ? window.location.hash : '#Certificates' }" class="mb-40">
        <!-- Tab Navigation -->
        <ul
            class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
            <template x-for="tab in ['#Certificates', '#Education', '#Skills', '#Languages' , '#Languages_setup']" :key="tab">
                <li class="me-2">
                    <a href="#" @click.prevent="activeTab = tab; window.location.hash = tab"
                        :aria-current="activeTab === tab ? 'page' : false"
                        :class="{
                            'text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500': activeTab ===
                                tab,
                            'hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300': activeTab !==
                                tab
                        }"
                        class="inline-block p-4 rounded-t-lg">
                        <span x-text="tab.replace('#', '')"></span>
                    </a>
                </li>
            </template>
        </ul>

        <!-- Certificates Tab Content -->
        <div class="mt-4">
            <div x-show="activeTab === '#Certificates'" class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
                <!-- Table displaying certificate data -->
                @include('qualifications.certificates.index') <!-- This should contain the table of certificates -->
            </div>
        </div>

        <!-- Education Tab Content -->
        <div class="mt-4">
            <div x-show="activeTab === '#Education'" class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
                <!-- Table displaying education data -->
                @include('qualifications.education.index') <!-- Include education table here -->
            </div>
        </div>

        <!-- Skills Tab Content -->
        <div class="mt-4">
            <div x-show="activeTab === '#Skills'" class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
                <!-- Table displaying skills data -->
                @include('qualifications.skills.index') <!-- Include skills table here -->
            </div>
        </div>

        <!-- Languages Tab Content -->
        <div class="mt-4">
            <div x-show="activeTab === '#Languages'" class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
                <!-- Table displaying languages data -->
                @include('qualifications.languages.index') <!-- Include languages table here -->
            </div>
        </div>

        <!-- Languages Setup Tab Content -->
        <div class="mt-4">
            <div x-show="activeTab === '#Languages_setup'" class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
                <!-- Table displaying languages data -->
                @include('qualifications.languages_setup.index') <!-- Include languages table here -->
            </div>
        </div>

    </div>
</x-app-layout>
