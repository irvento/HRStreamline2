<x-app-layout>
    <div class="max-w-4xl mx-auto mt-8 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
        <h1 class="text-3xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Edit Language Setup</h1>

        <form action="{{ route('languageSetup.update', $setup->languagesetup_id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Language Name -->
            <div class="space-y-2">
                <label for="name" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Language
                    Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $setup->name) }}"
                    class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500"
                    required>
                @error('name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Language Description -->
            <div class="space-y-2">
                <label for="description"
                    class="block text-sm font-medium text-gray-600 dark:text-gray-300">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500">{{ old('description', $setup->description) }}</textarea>
                @error('description')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end gap-4">
                <button type="submit"
                    class="px-6 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition">
                    Update Language
                </button>
                <a href="{{ url('/qualifications#Languages_Setup') }}"
                    class="px-6 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
