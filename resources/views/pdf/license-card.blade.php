<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Learner License Card - {{ $application->application_no }}</title>
    <style>
        @page { margin: 18px; }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: #0f172a;
        }
        .page-title {
            font-size: 12px;
            font-weight: 700;
            color: #334155;
            margin: 0 0 12px;
        }
        .card {
            width: 100%;
            height: 360px;
            position: relative;
            overflow: hidden;
            border-radius: 18px;
            background: linear-gradient(135deg, #f8fafc 0%, #eef2f7 45%, #dbeafe 100%);
            border: 1px solid #cbd5e1;
            margin-bottom: 18px;
        }
        .watermark {
            position: absolute;
            top: 50%;
            left: 10%;
            font-size: 52px;
            font-weight: 900;
            letter-spacing: 10px;
            color: rgba(15, 23, 42, 0.05);
        }
        .header {
            background: #ecfdf5;
            padding: 14px 18px 10px;
            border-bottom: 4px solid #16a34a;
        }
        .header-table { width: 100%; }
        .logo {
            width: 48px;
            height: 48px;
            border-radius: 24px;
        }
        .bn-title { font-size: 18px; font-weight: 900; }
        .en-title { font-size: 9px; font-weight: 700; color: #64748b; }
        .content { padding: 14px 18px; }
        .photo {
            width: 110px;
            height: 132px;
            background: #e5e7eb;
            border: 3px solid #fff;
        }
        .label {
            font-size: 8px;
            font-weight: 700;
            color: #752c41;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }
        .value { font-size: 12px; font-weight: 700; }
        .signature {
            font-size: 12px;
            text-align: center;
            margin-top: 18px;
        }
        .barcode svg { width: 100%; height: 48px; }
        .note { font-size: 9px; color: #752c41; line-height: 1.4; }
        .ref { font-size: 10px; font-weight: 700; }
        .side-img { height: 70px; }
        .class-img { height: 110px; border-radius: 10px; }
    </style>
</head>
<body>
    <p class="page-title">Digital Motor Driving License — {{ $application->name_english }}</p>

    <div class="card">
        <div class="watermark">BRTA</div>
        <div class="header">
            <table class="header-table">
                <tr>
                    <td style="width: 58px; vertical-align: middle;">
                        @if ($brtaLogoDataUri)
                            <img src="{{ $brtaLogoDataUri }}" class="logo" alt="BRTA">
                        @endif
                    </td>
                    <td style="vertical-align: middle;">
                        <div class="bn-title">মোটর ড্রাইভিং লাইসেন্স</div>
                        <div class="en-title">Motor Driving License</div>
                    </td>
                    <td style="text-align: right; vertical-align: middle;">
                        <div class="bn-title">গণপ্রজাতন্ত্রী বাংলাদেশ</div>
                        <div class="en-title">People's Republic of Bangladesh</div>
                    </td>
                    <td style="width: 58px; text-align: right; vertical-align: middle;">
                        @if ($flagDataUri)
                            <img src="{{ $flagDataUri }}" class="logo" alt="Bangladesh">
                        @endif
                    </td>
                </tr>
            </table>
        </div>
        <div class="content">
            <table class="header-table">
                <tr>
                    <td style="width: 130px; vertical-align: top;">
                        @if ($photoDataUri)
                            <img src="{{ $photoDataUri }}" class="photo" alt="Applicant">
                        @else
                            <div class="photo" style="text-align:center; font-size:10px; padding-top:50px; color:#94a3b8;">NO PHOTO</div>
                        @endif
                        <div class="signature">{{ $application->name_english }}</div>
                    </td>
                    <td style="vertical-align: top; padding-left: 16px;">
                        <div class="label">নাম / Name</div>
                        <div class="value" style="text-transform: uppercase; margin-bottom: 10px;">{{ $application->name_english }}</div>

                        <div class="label">জন্ম তারিখ / Date of Birth</div>
                        <div class="value" style="margin-bottom: 10px;">{{ $application->date_of_birth?->format('d M Y') }}</div>

                        <div class="label">রক্তের গ্রুপ / Blood Group</div>
                        <div class="value" style="margin-bottom: 10px;">{{ $application->blood_group }}</div>

                        <div class="label">পিতা/স্বামী / Father/Husband Name</div>
                        <div class="value" style="text-transform: uppercase; margin-bottom: 10px;">
                            {{ $application->father_name_english }}
                            @if ($application->spouse_name_english)
                                / {{ $application->spouse_name_english }}
                            @endif
                        </div>

                        <table class="header-table">
                            <tr>
                                <td>
                                    <div class="label">প্রদান/নবায়ন / Issue/Renewal</div>
                                    <div class="value">{{ $issuedAt->format('d/m/Y') }}</div>
                                </td>
                                <td>
                                    <div class="label">মেয়াদ / Validity</div>
                                    <div class="value">{{ $expiresAt->format('d/m/Y') }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="label">লাইসেন্স নং / License No.</div>
                                    <div class="value">{{ $application->application_no }}</div>
                                </td>
                                <td>
                                    <div class="label">প্রদানকারী কর্তৃপক্ষ / Issuing Authority</div>
                                    <div class="value" style="text-transform: uppercase;">brta, {{ $application->present_district }}</div>
                                </td>
                            </tr>
                        </table>
                        <p class="label" style="margin-top: 8px;">Bangladesh Road Transport Authority</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="content">
            <div class="barcode">
                {!! $barcodeSvg !!}
            </div>

            <table class="header-table" style="margin-top: 16px;">
                <tr>
                    <td style="width: 38%; vertical-align: top;">
                        @if ($simDataUri)
                            <img src="{{ $simDataUri }}" class="side-img" alt="Chip">
                        @endif
                        <p class="note">
                            Prefix of the licence number is district code and suffix is symbol of authorized vehicle class.
                            If lost or found, please inform Police Station.
                            Red background - Professional
                            Green background - Non-professional
                        </p>
                    </td>
                    <td style="vertical-align: top;">
                        <div class="label">Address</div>
                        <div class="value" style="font-size: 11px; margin-bottom: 12px;">
                            {{ $application->present_village }}
                            @if ($application->present_road)
                                , {{ $application->present_road }}
                            @endif
                            , {{ $application->present_thana }}
                            , {{ $application->present_district }}
                            , {{ $application->present_division }}
                            - {{ $application->present_post_code }}
                        </div>
                        @if ($vehicleClassDataUri)
                            <img src="{{ $vehicleClassDataUri }}" class="class-img" alt="Vehicle class">
                        @endif
                        <p class="ref">Ref. No. {{ $application->application_no }}</p>
                        <p class="ref">First Issue {{ $issuedAt->format('d/m/Y') }}</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
