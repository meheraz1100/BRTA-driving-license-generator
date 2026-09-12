<!DOCTYPE html>
<html lang="en" @class(['dark' => ($theme ?? 'light') === 'dark'])>

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Dashboard</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>


<body class="min-h-screen bg-slate-100 text-slate-900 dark:bg-slate-950 dark:text-slate-100">

    <x-app-navbar />


    <div class="mx-auto max-w-7xl px-6 py-10">

        <!-- Page Header -->
        <div class="mb-8">

            <h1 class="text-3xl font-bold text-slate-800 dark:text-white">
                Admin Dashboard
            </h1>

            <p class="mt-2 text-slate-500 dark:text-slate-400">
                Manage submitted applications.
            </p>

        </div>


        <!-- Success Message -->
        @if (session('success'))

            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-medium text-emerald-700 dark:border-emerald-500/20 dark:bg-emerald-500/10 dark:text-emerald-400">

                {{ session('success') }}

            </div>

        @endif


        <!-- Validation Errors -->
        @if ($errors->any())

            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4 dark:border-red-500/20 dark:bg-red-500/10">

                <ul class="space-y-1 text-sm text-red-600 dark:text-red-400">

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- Applications Table -->
        <div class="overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-slate-900 dark:ring-1 dark:ring-white/10">

            <div class="overflow-x-auto">

                <table class="w-full min-w-[1000px] text-left text-sm">

                    <!-- Table Header -->
                    <thead class="bg-slate-100 text-slate-600 dark:bg-slate-800 dark:text-slate-300">

                        <tr>

                            <th class="px-6 py-4 font-semibold">
                                Application No
                            </th>

                            <th class="px-6 py-4 font-semibold">
                                Applicant
                            </th>

                            <th class="px-6 py-4 font-semibold">
                                Email
                            </th>

                            <th class="px-6 py-4 font-semibold">
                                Exam Venue
                            </th>

                            <th class="px-6 py-4 font-semibold">
                                Status
                            </th>

                            <th class="px-6 py-4 font-semibold">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <!-- Table Body -->
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-700">

                        @forelse ($applications as $application)

                            <tr class="transition hover:bg-slate-50 dark:hover:bg-slate-800/80">


                                <!-- Application Number -->
                                <td class="px-6 py-5">

                                    <div class="font-semibold text-slate-800 dark:text-slate-100">
                                        {{ $application->application_no }}
                                    </div>

                                </td>


                                <!-- Applicant -->
                                <td class="px-6 py-5">

                                    <div class="font-medium text-slate-700 dark:text-slate-200">
                                        {{ $application->name_english }}
                                    </div>

                                </td>


                                <!-- Email -->
                                <td class="px-6 py-5 text-slate-600 dark:text-slate-400">

                                    {{ $application->email }}

                                </td>


                                <!-- Exam Venue -->
                                <td class="px-6 py-5 text-slate-600 dark:text-slate-400">

                                    {{ $application->exam_venue }}

                                </td>


                                <!-- Status -->
                                <td class="px-6 py-5">

                                    @if ($application->status === 'pending')

                                        <span class="inline-flex items-center rounded-full bg-amber-500/10 px-3 py-1.5 text-xs font-semibold text-amber-600 dark:text-amber-400">

                                            <span class="mr-2 h-1.5 w-1.5 rounded-full bg-amber-500"></span>

                                            Pending

                                        </span>


                                    @elseif ($application->status === 'approved')

                                        <span class="inline-flex items-center rounded-full bg-emerald-500/10 px-3 py-1.5 text-xs font-semibold text-emerald-600 dark:text-emerald-400">

                                            <span class="mr-2 h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                            Approved

                                        </span>


                                    @elseif ($application->status === 'rejected')

                                        <span class="inline-flex items-center rounded-full bg-red-500/10 px-3 py-1.5 text-xs font-semibold text-red-600 dark:text-red-400">

                                            <span class="mr-2 h-1.5 w-1.5 rounded-full bg-red-500"></span>

                                            Rejected

                                        </span>


                                    @else

                                        <span class="inline-flex items-center rounded-full bg-slate-500/10 px-3 py-1.5 text-xs font-semibold text-slate-500">

                                            Unknown

                                        </span>

                                    @endif

                                </td>


                                <!-- Actions -->
                                <td class="px-6 py-5">

                                    <div class="flex min-w-[260px] flex-col gap-3">


                                        <!-- View Application -->
                                        <a
                                            href="{{ route('application.success', $application) }}"
                                            class="inline-flex w-fit items-center rounded-lg bg-blue-500/10 px-3 py-2 text-xs font-semibold text-blue-600 transition hover:bg-blue-500/20 dark:text-blue-400"
                                        >
                                            View Application
                                        </a>


                                        @if ($application->status === 'pending')

                                            <!-- Approve -->
                                            <form
                                                action="{{ route('admin.applications.approve', $application) }}"
                                                method="POST"
                                            >
                                                @csrf

                                                <button
                                                    type="submit"
                                                    class="inline-flex w-fit items-center rounded-lg bg-emerald-600 px-4 py-2 text-xs font-semibold text-white transition hover:bg-emerald-500"
                                                >
                                                    Approve
                                                </button>

                                            </form>


                                            <!-- Reject -->
                                            <form
                                                action="{{ route('admin.applications.reject', $application) }}"
                                                method="POST"
                                                class="space-y-2"
                                            >
                                                @csrf

                                                <textarea
                                                    name="rejection_reason"
                                                    rows="2"
                                                    required
                                                    placeholder="Rejection reason..."
                                                    class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-xs text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-red-500 focus:ring-1 focus:ring-red-500 dark:border-slate-700 dark:bg-slate-800 dark:text-white"
                                                ></textarea>

                                                <button
                                                    type="submit"
                                                    class="inline-flex items-center rounded-lg bg-red-600 px-4 py-2 text-xs font-semibold text-white transition hover:bg-red-500"
                                                >
                                                    Reject
                                                </button>

                                            </form>


                                        @elseif ($application->status === 'approved')

                                            <!-- Approved -->
                                            <span class="inline-flex w-fit items-center rounded-lg bg-emerald-500/10 px-3 py-2 text-xs font-semibold text-emerald-600 dark:text-emerald-400">
                                                ✓ Application Approved
                                            </span>


                                            <!-- License -->
                                            <a
                                                href="{{ route('application.license', $application) }}"
                                                class="inline-flex w-fit items-center rounded-lg bg-blue-600 px-4 py-2 text-xs font-semibold text-white transition hover:bg-blue-500"
                                            >
                                                View License
                                            </a>


                                        @elseif ($application->status === 'rejected')

                                            <!-- Rejected -->
                                            <span class="inline-flex w-fit items-center rounded-lg bg-red-500/10 px-3 py-2 text-xs font-semibold text-red-600 dark:text-red-400">
                                                ✕ Application Rejected
                                            </span>


                                            @if ($application->rejection_reason)

                                                <div class="rounded-lg bg-red-50 px-3 py-2 text-xs leading-5 text-red-600 dark:bg-red-500/10 dark:text-red-400">

                                                    <span class="font-semibold">
                                                        Reason:
                                                    </span>

                                                    {{ $application->rejection_reason }}

                                                </div>

                                            @endif

                                        @endif

                                    </div>

                                </td>

                            </tr>


                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="px-6 py-16 text-center"
                                >

                                    <div class="text-slate-400">

                                        <p class="text-base font-semibold">
                                            No applications found.
                                        </p>

                                        <p class="mt-1 text-sm">
                                            Submitted applications will appear here.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>

</html>