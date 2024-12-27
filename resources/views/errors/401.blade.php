<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account Inactive</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 dark:bg-gray-900">

    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg max-w-md w-full p-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-red-600 mb-6">401: Unauthorized</h1>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">
                    You do not have permission to access this page. Please contact an
                    administrator if you believe this is an error.
                </p>
                <a href="{{ route('dashboard') }}"
                    class="inline-block px-6 py-3 text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-md transition duration-300 transform hover:scale-105">
                    Go back to home page
                </a>
            </div>
        </div>
    </div>

</body>

</html>
