<x-app-layout>
    <div class="container mx-auto mt-10 p-8 bg-white shadow-xl rounded-lg max-w-3xl">
        <!-- Education Heading (Degree and Field of Study) -->
        <h1 class="text-4xl font-bold text-center text-blue-600 mb-8">{{ $education->degree }} in {{ $education->field_of_study }}</h1>

        <!-- Education Details -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Education ID -->
            <div class="flex justify-center items-center">
                <label class="block text-gray-700 font-medium">Education ID:</label>
                <p class="text-gray-800 text-lg">{{ $education->education_id }}</p>
            </div>
            <!-- Employee Name -->
            <div class="flex justify-center items-center">
                <label class="block text-gray-700 font-medium">Employee Name:</label>
                <p class="text-gray-800 text-lg">{{ $education->employee->employee_fname }} {{ $education->employee->employee_lname }}</p>
            </div>
            <!-- Degree -->
            <div class="flex justify-center items-center">
                <label class="block text-gray-700 font-medium">Degree:</label>
                <p class="text-gray-800">{{ $education->degree }}</p>
            </div>
            <!-- Field of Study -->
            <div class="flex justify-center items-center">
                <label class="block text-gray-700 font-medium">Field of Study:</label>
                <p class="text-gray-800">{{ $education->field_of_study }}</p>
            </div>
            <!-- Institution Name -->
            <div class="flex justify-center items-center">
                <label class="block text-gray-700 font-medium">Institution Name:</label>
                <p class="text-gray-800">{{ $education->institution_name }}</p>
            </div>
            <!-- Start Date -->
            <div class="flex justify-center items-center">
                <label class="block text-gray-700 font-medium">Start Date:</label>
                <p class="text-gray-800">{{ \Carbon\Carbon::parse($education->start_date)->format('F j, Y') }}</p>
            </div>
            <!-- End Date -->
            <div class="flex justify-center items-center">
                <label class="block text-gray-700 font-medium">End Date:</label>
                <p class="text-gray-800">{{ \Carbon\Carbon::parse($education->end_date)->format('F j, Y') }}</p>
            </div>
        </div>

        <!-- Education Footer (Optional) -->
        <div class="mt-8">
            <p class="text-sm text-gray-500 text-center">This education record is managed by HRStreamline, a leading provider of employee management solutions.</p>
        </div>
    </div>
      <!-- Back Button -->
      <div class="container mx-auto mt-6 text-center">
        <a 
            href="{{ url()->previous() }}" 
            class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold text-lg rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Back
        </a>
    </div>
</x-app-layout>
