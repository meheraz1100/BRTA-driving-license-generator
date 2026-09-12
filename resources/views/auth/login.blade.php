<!DOCTYPE html>
<html lang="en" @class(['dark' => ($theme ?? 'light') === 'dark'])>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100 text-slate-900 dark:bg-slate-950 dark:text-slate-100">

    <x-app-navbar />

    <div class="flex justify-center p-6">
    <div class="w-full max-w-md">

        <div class="bg-white rounded-2xl shadow-xl p-8 dark:bg-slate-900 dark:shadow-none dark:ring-1 dark:ring-white/10">

            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-slate-900 dark:text-white">
                    Applicant Login
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    Login to continue your application
                </p>
            </div>

            @if ($errors->any())
                <div class="mb-5 rounded-lg bg-red-50 border border-red-200 p-4">
                    <p class="text-sm text-red-700">
                        {{ $errors->first() }}
                    </p>
                </div>
            @endif

            <form action="{{ route('login.store') }}" method="POST" class="space-y-5">

                @csrf

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                    >
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        required
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                    >
                </div>

                <button
                    type="submit"
                    class="w-full rounded-lg bg-blue-600 px-4 py-3 font-semibold text-white hover:bg-blue-700 transition"
                >
                    Login
                </button>

            </form>

            <p class="mt-6 text-center text-sm text-slate-600">
                Don't have an account?

                <a
                    href="{{ route('register') }}"
                    class="font-semibold text-blue-600 hover:text-blue-700"
                >
                    Create Account
                </a>
            </p>

        </div>

    </div>
    </div>

</body>
</html>