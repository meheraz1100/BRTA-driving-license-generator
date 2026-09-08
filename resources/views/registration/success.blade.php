<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Application Submitted
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="bg-gray-50 min-h-screen">

    <div class="max-w-6xl mx-auto px-4 py-8">

        <!-- Success Header -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">

            <div class="flex items-start gap-4">

                <div class="flex-shrink-0">

                    <div class="w-11 h-11 rounded-full bg-green-100
                                flex items-center justify-center">

                        <svg
                            class="w-6 h-6 text-green-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 13l4 4L19 7"
                            />
                        </svg>

                    </div>

                </div>


                <div class="flex-1">

                    <h1 class="text-xl font-semibold text-gray-800">
                        Application Submitted Successfully
                    </h1>

                    <p class="text-sm text-gray-500 mt-1">
                        Your application has been successfully saved.
                    </p>

                    <div class="mt-4 inline-flex items-center
                                rounded-lg bg-blue-50 px-4 py-2">

                        <span class="text-sm text-gray-600 mr-2">
                            Application No:
                        </span>

                        <span class="font-semibold text-blue-700">
                            {{ $application->application_no }}
                        </span>

                    </div>

                </div>

            </div>

        </div>


        <!-- Personal Information -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">

            <h2 class="text-lg font-semibold text-gray-800 mb-5">
                Personal Information
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

                <div>
                    <p class="text-xs text-gray-500">
                        Name
                    </p>

                    <p class="mt-1 font-medium text-gray-800">
                        {{ $application->name_english }}
                    </p>
                </div>


                <div>
                    <p class="text-xs text-gray-500">
                        Name (Bangla)
                    </p>

                    <p class="mt-1 font-medium text-gray-800">
                        {{ $application->name_bangla }}
                    </p>
                </div>


                <div>
                    <p class="text-xs text-gray-500">
                        NID
                    </p>

                    <p class="mt-1 font-medium text-gray-800">
                        {{ $application->nid }}
                    </p>
                </div>


                <div>
                    <p class="text-xs text-gray-500">
                        Date of Birth
                    </p>

                    <p class="mt-1 font-medium text-gray-800">
                        {{ $application->date_of_birth?->format('d M Y') }}
                    </p>
                </div>


                <div>
                    <p class="text-xs text-gray-500">
                        Father's Name
                    </p>

                    <p class="mt-1 font-medium text-gray-800">
                        {{ $application->father_name_english }}
                    </p>
                </div>


                <div>
                    <p class="text-xs text-gray-500">
                        Mother's Name
                    </p>

                    <p class="mt-1 font-medium text-gray-800">
                        {{ $application->mother_name_english }}
                    </p>
                </div>


                <div>
                    <p class="text-xs text-gray-500">
                        Gender
                    </p>

                    <p class="mt-1 font-medium text-gray-800 capitalize">
                        {{ $application->gender }}
                    </p>
                </div>


                <div>
                    <p class="text-xs text-gray-500">
                        Marital Status
                    </p>

                    <p class="mt-1 font-medium text-gray-800 capitalize">
                        {{ $application->marital_status }}
                    </p>
                </div>


                <div>
                    <p class="text-xs text-gray-500">
                        Occupation
                    </p>

                    <p class="mt-1 font-medium text-gray-800">
                        {{ $application->occupation }}
                    </p>
                </div>


                <div>
                    <p class="text-xs text-gray-500">
                        Blood Group
                    </p>

                    <p class="mt-1 font-medium text-gray-800">
                        {{ $application->blood_group }}
                    </p>
                </div>

            </div>

        </div>


        <!-- Address -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">

            <h2 class="text-lg font-semibold text-gray-800 mb-5">
                Address Information
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Present Address -->
                <div>

                    <h3 class="font-medium text-gray-700 mb-3">
                        Present Address
                    </h3>

                    <div class="text-sm text-gray-600 space-y-1">

                        <p>
                            {{ $application->present_village }}
                        </p>

                        @if($application->present_road)
                            <p>
                                {{ $application->present_road }}
                            </p>
                        @endif

                        <p>
                            {{ $application->present_thana }},
                            {{ $application->present_district }}
                        </p>

                        <p>
                            {{ $application->present_division }}
                            -
                            {{ $application->present_post_code }}
                        </p>

                    </div>

                </div>


                <!-- Permanent Address -->
                <div>

                    <h3 class="font-medium text-gray-700 mb-3">
                        Permanent Address
                    </h3>

                    <div class="text-sm text-gray-600 space-y-1">

                        <p>
                            {{ $application->permanent_village }}
                        </p>

                        @if($application->permanent_road)
                            <p>
                                {{ $application->permanent_road }}
                            </p>
                        @endif

                        <p>
                            {{ $application->permanent_thana }},
                            {{ $application->permanent_district }}
                        </p>

                        <p>
                            {{ $application->permanent_division }}
                            -
                            {{ $application->permanent_post_code }}
                        </p>

                    </div>

                </div>

            </div>

        </div>


        <!-- Contact -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">

            <h2 class="text-lg font-semibold text-gray-800 mb-5">
                Contact Information
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">

                <div>
                    <p class="text-xs text-gray-500">
                        Mobile
                    </p>

                    <p class="mt-1 font-medium text-gray-800">
                        {{ $application->mobile }}
                    </p>
                </div>


                <div>
                    <p class="text-xs text-gray-500">
                        Email
                    </p>

                    <p class="mt-1 font-medium text-gray-800 break-all">
                        {{ $application->email }}
                    </p>
                </div>


                <div>
                    <p class="text-xs text-gray-500">
                        Emergency Contact
                    </p>

                    <p class="mt-1 font-medium text-gray-800">
                        {{ $application->emergency_name }}
                    </p>
                </div>


                <div>
                    <p class="text-xs text-gray-500">
                        Emergency Mobile
                    </p>

                    <p class="mt-1 font-medium text-gray-800">
                        {{ $application->emergency_mobile }}
                    </p>
                </div>

            </div>

        </div>


        <!-- Licensing -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">

            <h2 class="text-lg font-semibold text-gray-800 mb-5">
                Licensing & Examination
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">

                <div>

                    <p class="text-xs text-gray-500">
                        License Type
                    </p>

                    <p class="mt-1 font-medium text-gray-800">
                        {{ ucwords(str_replace('_', ' ', $application->license_type)) }}
                    </p>

                </div>


                <div>

                    <p class="text-xs text-gray-500">
                        Instructor License No
                    </p>

                    <p class="mt-1 font-medium text-gray-800">
                        {{ $application->instructor_license_no }}
                    </p>

                </div>


                <div>

                    <p class="text-xs text-gray-500">
                        Exam Venue
                    </p>

                    <p class="mt-1 font-medium text-gray-800">
                        {{ $application->exam_venue }}
                    </p>

                </div>


                <div>

                    <p class="text-xs text-gray-500">
                        Vehicle Class
                    </p>

                    <p class="mt-1 font-medium text-gray-800">
                        {{ collect($application->vehicle_class)
                            ->map(fn ($class) => strtoupper($class))
                            ->join(', ') }}
                    </p>

                </div>

            </div>

        </div>


        <!-- Generate License -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

            <div class="flex flex-col md:flex-row
                        md:items-center md:justify-between gap-4">

                <div>

                    <h2 class="text-lg font-semibold text-gray-800">
                        Learner License Card
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Review your submitted information before generating
                        your learner license card.
                    </p>

                </div>


                <a
                    href="{{ route('application.license', $application) }}"
                    class="inline-flex items-center justify-center
                           px-6 py-2.5 rounded-lg
                           bg-blue-600 text-white font-medium
                           hover:bg-blue-700 transition"
                >
                    Generate License
                </a>

            </div>

        </div>

    </div>

</body>

</html>