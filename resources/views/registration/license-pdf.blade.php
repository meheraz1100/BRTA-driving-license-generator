<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <style>
        @page {
            margin: 10mm;
        }

        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            color: #111827;
            font-size: 11px;
        }

        .demo-card {
            border: 2px solid #1f2937;
            border-radius: 10px;
            padding: 18px;
            width: 100%;
            box-sizing: border-box;
        }

        .demo-label {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 12px;
            padding: 7px;
            border: 2px solid #991b1b;
            color: #991b1b;
        }

        .header {
            text-align: center;
            border-bottom: 1px solid #9ca3af;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .header-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 4px;
        }

        .header-subtitle {
            font-size: 12px;
            color: #4b5563;
        }

        .application-number {
            margin-top: 8px;
            font-size: 13px;
            font-weight: bold;
        }

        .content-table {
            width: 100%;
            border-collapse: collapse;
        }

        .photo-cell {
            width: 25%;
            vertical-align: top;
            text-align: center;
        }

        .photo {
            width: 115px;
            height: 145px;
            object-fit: cover;
            border: 1px solid #374151;
        }

        .info-cell {
            width: 75%;
            vertical-align: top;
            padding-left: 18px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 6px 4px;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: top;
        }

        .label {
            width: 32%;
            font-weight: bold;
            color: #374151;
        }

        .value {
            width: 68%;
        }

        .section-title {
            margin-top: 18px;
            margin-bottom: 7px;
            font-size: 13px;
            font-weight: bold;
            border-bottom: 1px solid #9ca3af;
            padding-bottom: 4px;
        }

        .status {
            display: inline-block;
            padding: 5px 12px;
            font-weight: bold;
            border: 1px solid #166534;
            color: #166534;
        }

        .footer {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #9ca3af;
            text-align: center;
            font-size: 9px;
            color: #6b7280;
        }
    </style>
</head>

<body>

    <div class="demo-card">

        


        <table class="content-table">

            <tr>

                <td class="photo-cell">

                    @if ($application->applicant_photo)

                        <img
                            class="photo"
                            src="{{ public_path('storage/' . $application->applicant_photo) }}"
                        >

                    @else

                        <div
                            style="
                                width:115px;
                                height:145px;
                                border:1px solid #374151;
                                text-align:center;
                                padding-top:60px;
                                box-sizing:border-box;
                            "
                        >
                            No Photo
                        </div>

                    @endif


                    

                </td>


                <td class="info-cell">

                    <table class="info-table">

                        <tr>
                            <td class="label">Name</td>
                            <td class="value">
                                {{ $application->name_english }}
                            </td>
                        </tr>

                        <tr>
                            <td class="label">Date of Birth</td>
                            <td class="value">
                                
                                {{ optional($application->date_of_birth)->format('d M Y') }}
                            </td>
                        </tr>

                        <tr>
                            <td class="label">Blood Group</td>
                            <td class="value">
                                {{ $application->blood_group }}
                            </td>
                        </tr>

                        <tr>
                            <td class="label">Father/Husband</td>
                            <td class="value">
                                {{ $application->father_name_english }}

                                @if($application->spouse_name_english)
                                / {{ $application->spouse_name_english }}
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td class="label">Mobile</td>
                            <td class="value">
                                {{ $application->mobile }}
                            </td>
                        </tr>

                        <tr>
                            <td class="label">Email</td>
                            <td class="value">
                                {{ $application->email }}
                            </td>
                        </tr>

                        <tr>
                            <td class="label">Address</td>
                            <td class="value">
                                {{ $application->present_village }}

                        @if($application->present_road)
                        , {{ $application->present_road }}
                        @endif

                        , {{ $application->present_thana }}
                        , {{ $application->present_district }}
                        , {{ $application->present_division }}

                        - {{ $application->present_post_code }}
                            </td>
                        </tr>

                        <tr>
                            <td class="label">License No.</td>
                            <td class="value">
                                {{ $application->application_no }}
                            </td>
                        </tr>
                        <tr>
                            <td class="label">Issuing Authority</td>
                            <td class="value">
                                BRTA, {{ $application->present_district }}
                            </td>
                        </tr>

                    </table>

                </td>

            </tr>

        </table>


        <div class="section-title">
            Vehicle Class
        </div>

        <div class="capitalize">
            @if (is_array($application->vehicle_class))

                {{ implode(', ', $application->vehicle_class) }}

            @else

                {{ $application->vehicle_class }}

            @endif
        </div>


        <div class="section-title">
            Application Status
        </div>

        <div class="status">
            {{ strtoupper($application->status) }}
        </div>


        

    </div>

</body>

</html>



