<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    @vite('resources/css/app.css')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Custom Styles */
        .container {
            max-width: 400px;
        }
        body {
            font-family: 'Poppins', sans-serif;
        }
        input[type="text"], input[type="password"] {
            padding-left: 10px;
        }
        .logo-text {
            font-size: 2.5rem;
            font-weight: bold;
            color: #151162;
            text-align: center;
            letter-spacing: 0.1rem;
            margin-bottom: 0.2rem;
            font-style: italic;
        }
        .subtitle-text {
            font-size: small;
            text-align: center;
            color: #6c757d;
            margin-top: -1rem;
        }
        .sign-in-text, .sign-up-text {
            font-size: 1.5rem;
            letter-spacing: 0.05rem;
            text-align: center;
        }
        .submit-btn {
            letter-spacing: 0.1rem;
=======
        /* Add padding to the input fields */
        input[type="text"], input[type="password"] {
            padding-left: 10px; /* Adjust the value as needed */
        }
    </style>
</head>
<body class="bg-white">
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <div class="logo-text">VOGENCY</div>
        <div class="subtitle-text">Step into Style and Comfort</div>

        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 sign-up-text">Create your account</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form class="space-y-6" action="/create" method="POST">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                <div class="mt-2">
                    <input id="name" name="name" type="text" required class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600">
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                <div class="mt-2">
                    <input id="password" name="password" type="password" required class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600">
                </div>
            </div>

            <div>
                <label for="confirm_password" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
                <div class="mt-2">
                    <input id="confirm_password" name="password_confirmation" type="password" required class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600">
                </div>
            </div>

            <div>
                <button type="submit" class="submit-btn flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-normal leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">SIGN UP</button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500">
            Already have an account?
            <a href="/login" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Login here</a>
        </p>
    </div>
</div>

</body>
</html>
