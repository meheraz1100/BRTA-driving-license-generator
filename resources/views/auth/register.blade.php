<!DOCTYPE html>
<html lang="en" @class(['dark' => ($theme ?? 'light') === 'dark'])>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100 text-slate-900 dark:bg-slate-950 dark:text-slate-100">

    <x-app-navbar />

    <div class="flex justify-center p-6">

    <div class="w-full max-w-md">

        <div class="bg-white rounded-2xl shadow-xl p-8 dark:bg-slate-900 dark:shadow-none dark:ring-1 dark:ring-white/10">

            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-slate-900 dark:text-white">
                    Create Account
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    Create your applicant account
                </p>
            </div>

            <form action="{{ route('register.store') }}" method="POST" class="space-y-5">

                @csrf

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">
                        Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                    >

                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                    >

                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
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

                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        required
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                    >
                </div>

                <button
                    type="submit"
                    class="w-full rounded-lg bg-blue-600 px-4 py-3 font-semibold text-white hover:bg-blue-700 transition"
                >
                    Create Account
                </button>

            </form>

            <p class="mt-6 text-center text-sm text-slate-600">
                Already have an account?

                <a
                    href="{{ route('login') }}"
                    class="font-semibold text-blue-600 hover:text-blue-700"
                >
                    Login
                </a>
            </p>

        </div>

    </div>
    </div>

</body>
</html>