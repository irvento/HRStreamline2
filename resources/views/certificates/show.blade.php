<x-app-layout>
    <div class="container mx-auto mt-10 p-8 bg-white shadow-xl rounded-lg max-w-3xl">
        <!-- Certificate Heading (Certificate Name) -->
        <h1 class="text-4xl font-bold text-center text-blue-600 mb-8">{{ $certificate->certificate_name }}</h1>

        <!-- Certificate Details -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Certificate ID -->
            <div class="flex justify-center items-center">
                <label class="block text-gray-700 font-medium">Certificate ID:</label>
                <p class="text-gray-800 text-lg">{{ $certificate->certificate_id }}</p>
            </div>
            <!-- Employee Name -->
            <div class="flex justify-center items-center">
                <label class="block text-gray-700 font-medium">Employee Name:</label>
                <p class="text-gray-800 text-lg">{{ $certificate->employee->employee_fname }}
                    {{ $certificate->employee->employee_lname }}</p>
            </div>
            <!-- Issued By -->
            <div class="flex justify-center items-center">
                <label class="block text-gray-700 font-medium">Issued By:</label>
                <p class="text-gray-800">{{ $certificate->issued_by }}</p>
            </div>
            <!-- Issue Date -->
            <div class="flex justify-center items-center">
                <label class="block text-gray-700 font-medium">Issue Date:</label>
                <p class="text-gray-800">{{ \Carbon\Carbon::parse($certificate->issue_date)->format('F j, Y') }}</p>
            </div>
            <!-- Expiry Date -->
            <div class="flex justify-center items-center">
                <label class="block text-gray-700 font-medium">Expiry Date:</label>
                <p class="text-gray-800">{{ \Carbon\Carbon::parse($certificate->expiry_date)->format('F j, Y') }}</p>
            </div>
        </div>

        <!-- Certificate Footer (Optional) -->
        <div class="mt-8">
            <p class="text-sm text-gray-500 text-center">This certificate is issued by HRStreamline, a leading provider
                of employee management solutions.</p>
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
