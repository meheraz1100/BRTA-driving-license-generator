<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100">

    <div class="mx-auto max-w-7xl px-6 py-10">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-800">
                Admin Dashboard
            </h1>

            <p class="mt-2 text-slate-500">
                Manage submitted applications.
            </p>
        </div>

        <div class="overflow-hidden rounded-2xl bg-white shadow-sm">

            <div class="overflow-x-auto">

                <table class="w-full text-left text-sm">

                    <thead class="bg-slate-100 text-slate-600">
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

                    <tbody class="divide-y divide-slate-200">

                        @forelse ($applications as $application)

                        <tr class="hover:bg-slate-50">

                            <td class="px-6 py-4 font-medium text-slate-800">
                                {{ $application->application_no }}
                            </td>

                            <td class="px-6 py-4 text-slate-700">
                                {{ $application->name_english }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $application->email }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $application->exam_venue }}
                            </td>


                            <td class="px-6 py-4">

                                <a
                                    href="{{ route('application.success', $application) }}"
                                    class="font-medium text-blue-600 hover:text-blue-800">
                                    View
                                </a>

                                <form
                                    action="{{ route('admin.applications.approve', $application) }}"
                                    method="POST"
                                    class="mt-2">
                                    @csrf

                                    <button
                                        type="submit"
                                        class="font-medium text-green-600 hover:text-green-800">
                                        Approve
                                    </button>
                                </form>

                                <form
                                    action="{{ route('admin.applications.reject', $application) }}"
                                    method="POST"
                                    class="mt-3">
                                    @csrf

                                    <textarea
                                        name="rejection_reason"
                                        rows="2"
                                        placeholder="Rejection reason..."
                                        required
                                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-red-500 focus:outline-none"></textarea>

                                    <button
                                        type="submit"
                                        class="mt-2 font-medium text-red-600 hover:text-red-800">
                                        Reject
                                    </button>
                                </form>

                            </td>

                            <td class="px-6 py-4">
                                <a
                                    href="{{ route('application.success', $application) }}"
                                    class="font-medium text-blue-600 hover:text-blue-800">
                                    View
                                </a>
                                <form
                                    action="{{ route('admin.applications.approve', $application) }}"
                                    method="POST"
                                    class="mt-2">
                                    @csrf

                                    <button
                                        type="submit"
                                        class="font-medium text-green-600 hover:text-green-800">
                                        Approve
                                    </button>
                                </form>
                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td
                                colspan="6"
                                class="px-6 py-10 text-center text-slate-500">
                                No applications found.
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