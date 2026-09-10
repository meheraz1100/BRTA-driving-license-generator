<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        My Applications
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="min-h-screen bg-gray-50">

    <div class="mx-auto max-w-6xl px-4 py-8">

        <!-- Header -->
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    My Applications
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    View and manage your submitted applications.
                </p>
            </div>

            <a
                href="{{ route('application') }}"
                class="inline-flex items-center justify-center rounded-lg
                       bg-blue-600 px-5 py-2.5 text-sm font-medium
                       text-white shadow-sm transition hover:bg-blue-700"
            >
                <span class="mr-2 text-lg leading-none">+</span>
                New Application
            </a>

        </div>


        @if ($applications->isEmpty())

            <!-- Empty State -->
            <div class="rounded-xl border border-gray-200 bg-white p-10 text-center shadow-sm">

                <div class="mx-auto flex h-14 w-14 items-center justify-center
                            rounded-full bg-blue-50">

                    <svg
                        class="h-7 w-7 text-blue-600"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h6l5 5v11a2 2 0 01-2 2z"
                        />
                    </svg>

                </div>


                <h2 class="mt-5 text-lg font-semibold text-gray-800">
                    No applications found
                </h2>

                <p class="mt-2 text-sm text-gray-500">
                    You have not submitted any application yet.
                </p>

                <a
                    href="{{ route('application') }}"
                    class="mt-6 inline-flex items-center justify-center
                           rounded-lg bg-blue-600 px-5 py-2.5
                           text-sm font-medium text-white
                           transition hover:bg-blue-700"
                >
                    Create New Application
                </a>

            </div>

        @else

            <!-- Application Summary -->
            <div class="mb-5 grid grid-cols-1 gap-4 sm:grid-cols-3">

                <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
                    <p class="text-sm text-gray-500">
                        Total Applications
                    </p>

                    <p class="mt-1 text-2xl font-bold text-gray-800">
                        {{ $applications->count() }}
                    </p>
                </div>


                <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
                    <p class="text-sm text-gray-500">
                        Pending
                    </p>

                    <p class="mt-1 text-2xl font-bold text-yellow-600">
                        {{ $applications->where('status', 'pending')->count() }}
                    </p>
                </div>


                <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
                    <p class="text-sm text-gray-500">
                        Approved
                    </p>

                    <p class="mt-1 text-2xl font-bold text-green-600">
                        {{ $applications->where('status', 'approved')->count() }}
                    </p>
                </div>

            </div>


            <!-- Applications Table -->
            <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-200">

                        <thead class="bg-gray-50">

                            <tr>

                                <th class="px-6 py-4 text-left text-xs font-semibold
                                           uppercase tracking-wider text-gray-500">
                                    Application No
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold
                                           uppercase tracking-wider text-gray-500">
                                    Submitted
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold
                                           uppercase tracking-wider text-gray-500">
                                    Status
                                </th>

                                <th class="px-6 py-4 text-right text-xs font-semibold
                                           uppercase tracking-wider text-gray-500">
                                    Action
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-gray-200">

                            @foreach ($applications as $application)

                                <tr class="transition hover:bg-gray-50">

                                    <!-- Application Number -->
                                    <td class="whitespace-nowrap px-6 py-5">

                                        <div class="font-semibold text-gray-800">
                                            {{ $application->application_no }}
                                        </div>

                                        <div class="mt-1 text-xs text-gray-400">
                                            Learner License Application
                                        </div>

                                    </td>


                                    <!-- Date -->
                                    <td class="whitespace-nowrap px-6 py-5 text-sm text-gray-600">

                                        {{ $application->created_at->format('d M Y') }}

                                        <div class="mt-1 text-xs text-gray-400">
                                            {{ $application->created_at->format('h:i A') }}
                                        </div>

                                    </td>


                                    <!-- Status -->
                                    <td class="whitespace-nowrap px-6 py-5">

                                        @if ($application->status === 'approved')

                                            <span class="inline-flex items-center rounded-full
                                                         bg-green-100 px-3 py-1 text-xs
                                                         font-semibold text-green-700">

                                                <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-green-500"></span>

                                                Approved

                                            </span>

                                        @elseif ($application->status === 'rejected')

                                            <span class="inline-flex items-center rounded-full
                                                         bg-red-100 px-3 py-1 text-xs
                                                         font-semibold text-red-700">

                                                <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-red-500"></span>

                                                Rejected

                                            </span>

                                        @else

                                            <span class="inline-flex items-center rounded-full
                                                         bg-yellow-100 px-3 py-1 text-xs
                                                         font-semibold text-yellow-700">

                                                <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-yellow-500"></span>

                                                Pending

                                            </span>

                                        @endif

                                    </td>


                                    <!-- Actions -->
                                    <td class="whitespace-nowrap px-6 py-5 text-right">

                                        <a
                                            href="{{ route('application.success', $application) }}"
                                            class="inline-flex items-center rounded-lg border
                                                   border-gray-300 bg-white px-3.5 py-2
                                                   text-sm font-medium text-gray-700
                                                   transition hover:bg-gray-50"
                                        >
                                            View
                                        </a>


                                        @if ($application->status === 'approved')

                                            <a
                                                href="{{ route('application.license', $application) }}"
                                                class="ml-2 inline-flex items-center rounded-lg
                                                       bg-green-600 px-3.5 py-2 text-sm
                                                       font-medium text-white transition
                                                       hover:bg-green-700"
                                            >
                                                License
                                            </a>

                                        @endif

                                    </td>

                                </tr>


                                <!-- Rejection Reason -->
                                @if ($application->status === 'rejected' && $application->rejection_reason)

                                    <tr>

                                        <td colspan="4" class="bg-red-50 px-6 py-4">

                                            <div class="flex items-start gap-3">

                                                <svg
                                                    class="mt-0.5 h-5 w-5 flex-shrink-0 text-red-500"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                    />
                                                </svg>

                                                <div>

                                                    <p class="text-sm font-semibold text-red-700">
                                                        Rejection Reason
                                                    </p>

                                                    <p class="mt-1 text-sm text-red-600">
                                                        {{ $application->rejection_reason }}
                                                    </p>

                                                </div>

                                            </div>

                                        </td>

                                    </tr>

                                @endif

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        @endif

    </div>

</body>

</html>