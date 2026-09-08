<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Learner License Card - {{ $application->application_no }}
    </title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @page {
            size: auto;
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #e5e7eb;
        }

        .card {
            width: 856px;
            height: 540px;
            position: relative;
            overflow: hidden;
            border-radius: 28px;
            background:
                linear-gradient(
                    135deg,
                    #f8fafc 0%,
                    #eef2f7 45%,
                    #dbeafe 100%
                );
            box-shadow:
                0 30px 60px rgba(15, 23, 42, 0.22);
        }

        .card::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(
                    circle at 15% 15%,
                    rgba(59, 130, 246, 0.15),
                    transparent 32%
                ),
                radial-gradient(
                    circle at 90% 90%,
                    rgba(14, 116, 144, 0.12),
                    transparent 35%
                );
            pointer-events: none;
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-25deg);
            font-size: 115px;
            font-weight: 900;
            letter-spacing: 18px;
            color: rgba(15, 23, 42, 0.055);
            white-space: nowrap;
            pointer-events: none;
            z-index: 1;
        }

        .security-line {
            position: absolute;
            inset: 18px;
            border: 1px solid rgba(30, 64, 175, 0.2);
            border-radius: 22px;
            pointer-events: none;
        }

        .photo-frame {
            width: 155px;
            height: 185px;
            border-radius: 12px;
            overflow: hidden;
            background: #e5e7eb;
            border: 4px solid white;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .12);
        }

        .photo-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .label {
            font-size: 10px;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: .7px;
        }

        .value {
            font-size: 15px;
            font-weight: 700;
            color: #0f172a;
        }

        .mini-value {
            font-size: 13px;
            font-weight: 700;
            color: #0f172a;
        }

        .back-pattern {
            background-image:
                linear-gradient(
                    45deg,
                    rgba(30, 64, 175, .035) 25%,
                    transparent 25%,
                    transparent 75%,
                    rgba(30, 64, 175, .035) 75%
                ),
                linear-gradient(
                    -45deg,
                    rgba(30, 64, 175, .035) 25%,
                    transparent 25%,
                    transparent 75%,
                    rgba(30, 64, 175, .035) 75%
                );
            background-size: 36px 36px;
        }

        .demo-badge {
            position: absolute;
            top: 26px;
            right: 30px;
            z-index: 10;
            padding: 7px 14px;
            border: 2px solid #dc2626;
            color: #dc2626;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 1px;
            background: rgba(255, 255, 255, .85);
        }

        @media print {
            body {
                background: white;
            }

            .no-print {
                display: none !important;
            }

            .card {
                box-shadow: none;
                border-radius: 0;
            }
        }
    </style>
</head>

<body>

    <!-- Controls -->
    <div class="no-print flex justify-center gap-3 py-8">

        <a
            href="{{ route('application.success', $application) }}"
            class="rounded-lg bg-slate-800 px-5 py-2.5 text-sm font-semibold text-white hover:bg-slate-700"
        >
            ← Back
        </a>

        <button
            onclick="window.print()"
            class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-blue-700"
        >
            Print / Save PDF
        </button>

    </div>


    <!-- ========================= -->
    <!-- FRONT SIDE -->
    <!-- ========================= -->

    <div class="flex justify-center pb-10">

        <div class="card">

            <div class="security-line"></div>

            


            <!-- Header -->

            <div class="relative z-10 flex items-center px-10 pt-8">

                <div class="h-14 w-14 rounded-xl overflow-hidden shadow-lg">
    <img
        src="{{ asset('/storage/asset/images/brta-logo.png') }}"
        alt="DL Logo"
        class="h-full w-full object-cover"
    >
</div>

                <div class="ml-4">

                    <div class="text-2xl font-black tracking-tight text-slate-900">
                         মোটর ড্রাইভিং লাইসেন্স
                    </div>
                    <div class="text-xs font-bold uppercase tracking-[3px] text-slate-500">
                        MOTOR DRIVING LICENSE

                    </div>


                </div>

            </div>


            <!-- Main Content -->

            <div class="relative z-10 flex gap-7 px-10 pt-8">

                <!-- Photo -->

                <div>

                    <div class="photo-frame">

                        @if ($application->applicant_photo)
                            <img
                                src="{{ asset('storage/' . $application->applicant_photo) }}"
                                alt="Applicant Photo"
                            >
                        @else

                            <div class="flex h-full items-center justify-center text-xs text-slate-400">
                                NO PHOTO
                            </div>

                        @endif

                    </div>

                    <div class="mt-2 text-center text-[9px] font-bold uppercase tracking-wider text-slate-500">
                        Applicant Photo
                    </div>

                </div>


                <!-- Information -->

                <div class="flex-1">

                    <div class="grid grid-cols-2 gap-x-8 gap-y-5">

                        <div class="col-span-2">

                            <div class="label">
                                Full Name
                            </div>

                            <div class="text-[23px] font-black uppercase text-slate-950">
                                {{ $application->name_english }}
                            </div>

                        </div>


                        <div>

                            <div class="label">
                                Date of Birth
                            </div>

                            <div class="value">
                                {{ $application->date_of_birth?->format('d M Y') }}
                            </div>

                        </div>


                        <div>

                            <div class="label">
                                Blood Group
                            </div>

                            <div class="value">
                                {{ $application->blood_group }}
                            </div>

                        </div>


                        <div>

                            <div class="label">
                                Gender
                            </div>

                            <div class="value capitalize">
                                {{ $application->gender }}
                            </div>

                        </div>


                        <div>

                            <div class="label">
                                License Type
                            </div>

                            <div class="value">
                                {{ $application->license_type === 'professional'
                                    ? 'Professional'
                                    : 'Non-Professional' }}
                            </div>

                        </div>


                        <div class="col-span-2">

                            <div class="label">
                                Father / Husband Name
                            </div>

                            <div class="value uppercase">
                                {{ $application->father_name_english }}

                                @if($application->spouse_name_english)
                                    / {{ $application->spouse_name_english }}
                                @endif
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- Bottom Information -->

            <div class="absolute bottom-0 left-0 right-0 z-10 bg-slate-950 px-10 py-6">

                <div class="grid grid-cols-4 gap-6 text-white">

                    <div>

                        <div class="text-[9px] font-bold uppercase tracking-wider text-slate-400">
                            Application No.
                        </div>

                        <div class="mt-1 text-sm font-black">
                            {{ $application->application_no }}
                        </div>

                    </div>


                    <div>

                        <div class="text-[9px] font-bold uppercase tracking-wider text-slate-400">
                            Issue Date
                        </div>

                        <div class="mt-1 text-sm font-black">
                            {{ $application->created_at->format('d M Y') }}
                        </div>

                    </div>


                    <div>

                        <div class="text-[9px] font-bold uppercase tracking-wider text-slate-400">
                            Vehicle Class
                        </div>

                        <div class="mt-1 text-sm font-black uppercase">
                            {{ implode(', ', $application->vehicle_class ?? []) }}
                        </div>

                    </div>


                    <div>

                        <div class="text-[9px] font-bold uppercase tracking-wider text-slate-400">
                            Status
                        </div>

                        <div class="mt-1 text-sm font-black text-emerald-400">
                            APPLICATION APPROVED
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <!-- ========================= -->
    <!-- BACK SIDE -->
    <!-- ========================= -->

    <div class="flex justify-center pb-20">

        <div class="card back-pattern">

            <div class="security-line"></div>

            

            


            <!-- Header -->

            <div class="relative z-10 px-10 pt-9">

                <div class="text-xs font-bold uppercase tracking-[3px] text-slate-500">
                    Applicant Information
                </div>

                <div class="mt-1 text-2xl font-black text-slate-900">
                    LICENSE DETAILS
                </div>

            </div>


            <!-- Information Grid -->

            <div class="relative z-10 grid grid-cols-2 gap-x-12 gap-y-5 px-10 pt-7">


                <!-- Address -->

                <div class="col-span-2 rounded-xl border border-slate-200 bg-white/75 p-4">

                    <div class="label">
                        Present Address
                    </div>

                    <div class="mt-1 text-sm font-semibold leading-6 text-slate-800">

                        {{ $application->present_village }}

                        @if($application->present_road)
                            , {{ $application->present_road }}
                        @endif

                        , {{ $application->present_thana }}
                        , {{ $application->present_district }}
                        , {{ $application->present_division }}

                        - {{ $application->present_post_code }}

                    </div>

                </div>


                <!-- Mobile -->

                <div>

                    <div class="label">
                        Mobile
                    </div>

                    <div class="mini-value">
                        {{ $application->mobile }}
                    </div>

                </div>


                <!-- Email -->

                <div>

                    <div class="label">
                        Email
                    </div>

                    <div class="mini-value">
                        {{ $application->email }}
                    </div>

                </div>


                <!-- Emergency -->

                <div class="col-span-2 rounded-xl border border-slate-200 bg-white/75 p-4">

                    <div class="mb-3 text-[10px] font-black uppercase tracking-wider text-slate-500">
                        Emergency Contact
                    </div>

                    <div class="grid grid-cols-3 gap-5">

                        <div>

                            <div class="label">
                                Name
                            </div>

                            <div class="mini-value">
                                {{ $application->emergency_name }}
                            </div>

                        </div>


                        <div>

                            <div class="label">
                                Relationship
                            </div>

                            <div class="mini-value capitalize">
                                {{ $application->emergency_relationship }}
                            </div>

                        </div>


                        <div>

                            <div class="label">
                                Mobile
                            </div>

                            <div class="mini-value">
                                {{ $application->emergency_mobile }}
                            </div>

                        </div>

                    </div>

                </div>


                <!-- Vehicle Classes -->

                <div class="col-span-2">

                    <div class="label mb-2">
                        Permitted Vehicle Classes
                    </div>

                    <div class="flex gap-3">

                        @foreach($application->vehicle_class ?? [] as $vehicle)

                            <div class="rounded-lg border border-slate-300 bg-white px-5 py-2 text-xs font-black uppercase text-slate-800">

                                {{ $vehicle }}

                            </div>

                        @endforeach

                    </div>

                </div>


                <!-- Reference -->

                <div>

                    <div class="label">
                        Reference No.
                    </div>

                    <div class="mini-value">
                        {{ $application->application_no }}
                    </div>

                </div>


                <!-- Instructor -->

                <div>

                    <div class="label">
                        Instructor License
                    </div>

                    <div class="mini-value">
                        {{ $application->instructor_license_no }}
                    </div>

                </div>

            </div>


            <!-- Footer -->

            <div class="absolute bottom-0 left-0 right-0 z-10 border-t border-slate-300 bg-white/90 px-10 py-5">

                <div class="flex items-center justify-between">

                    <div class="max-w-[620px]">

                        <div class="text-[10px] font-black uppercase tracking-wider text-green-600">
                            A VALID DRIVING LICENCE
                        </div>

                        <div class="mt-1 text-[9px] leading-4 text-slate-500">

                            
                            It is an official government 
                            driving licence document.

                        </div>

                    </div>


                    <div class="flex h-16 w-16 items-center justify-center rounded-lg border-2 border-dashed border-slate-400">

                        <div class="text-center">

                            <div class="text-[8px] font-black text-slate-500">
                                VALID
                            </div>

                            <div class="text-[7px] text-slate-400">
                                CARD
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>