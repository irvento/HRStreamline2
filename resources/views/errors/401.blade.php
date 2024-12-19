<div class="min-h-screen bg-black flex items-center justify-center">
    <div class="bg-black p-8 rounded-lg shadow-lg max-w-lg w-full text-center">
        <div class="mb-6">
            <h1 class="text-6xl font-extrabold text-white flex justify-center items-center">
                <i class="fas fa-lock mr-4 text-7xl"></i> 401
            </h1>
            <h2 class="text-3xl font-semibold text-white">Unauthorized</h2>
        </div>
        <p class="text-lg text-white mb-6">You do not have permission to access this page. Please contact an administrator if you believe this is an error.</p>
        <a href="{{ route('dashboard') }}" class="text-lg text-blue-600 hover:text-blue-800 font-semibold transition duration-300">
            <i class="fas fa-arrow-left mr-2"></i> Go back to home page
        </a>
    </div>
</div>

<!-- Font Awesome CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
