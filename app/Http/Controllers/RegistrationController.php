<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Barryvdh\DomPDF\Facade\Pdf;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function myApplications()
    {
        $applications = Application::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('registration.my-applications', compact('applications'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([

            // Personal Information
            'nid' => [
                'required',
                'digits_between:10,17',
            ],

            'date_of_birth' => [
                'required',
                'date',
            ],

            'name_english' => [
                'required',
                'string',
                'max:100',
            ],

            'name_bangla' => [
                'required',
                'string',
                'max:100',
            ],

            'father_name_english' => [
                'required',
                'string',
                'max:100',
            ],

            'father_name_bangla' => [
                'required',
                'string',
                'max:100',
            ],

            'mother_name_english' => [
                'required',
                'string',
                'max:100',
            ],

            'mother_name_bangla' => [
                'required',
                'string',
                'max:100',
            ],

            'gender' => [
                'required',
                'in:male,female,other',
            ],

            'marital_status' => [
                'required',
                'in:single,married,divorced,widowed',
            ],

            'spouse_name_english' => [
                'nullable',
                'required_if:marital_status,married',
                'string',
                'max:100',
            ],

            'spouse_name_bangla' => [
                'nullable',
                'required_if:marital_status,married',
                'string',
                'max:100',
            ],

            'occupation' => [
                'required',
                'string',
                'max:100',
            ],

            'blood_group' => [
                'required',
                'in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            ],


            // Present Address
            'present_village' => [
                'required',
                'string',
                'max:150',
            ],

            'present_road' => [
                'nullable',
                'string',
                'max:150',
            ],

            'present_division' => [
                'required',
                'string',
            ],

            'present_district' => [
                'required',
                'string',
            ],

            'present_thana' => [
                'required',
                'string',
            ],

            'present_post_code' => [
                'required',
                'digits:4',
            ],


            // Permanent Address
            'permanent_village' => [
                'required',
                'string',
                'max:150',
            ],

            'permanent_road' => [
                'nullable',
                'string',
                'max:150',
            ],

            'permanent_division' => [
                'required',
                'string',
            ],

            'permanent_district' => [
                'required',
                'string',
            ],

            'permanent_thana' => [
                'required',
                'string',
            ],

            'permanent_post_code' => [
                'required',
                'digits:4',
            ],


            // Citizenship
            'nationality' => [
                'required',
                'string',
                'max:50',
            ],

            'has_other_citizenship' => [
                'required',
                'in:no,yes',
            ],

            'other_citizenship' => [
                'nullable',
                'required_if:has_other_citizenship,yes',
                'string',
                'max:100',
            ],


            // Applicant Contact
            'phone_residence' => [
                'nullable',
                'string',
                'max:20',
            ],

            'mobile' => [
                'required',
                'regex:/^01[3-9]\d{8}$/',
            ],

            'phone_office' => [
                'nullable',
                'string',
                'max:20',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
            ],


            // Emergency Contact
            'emergency_name' => [
                'required',
                'string',
                'max:100',
            ],

            'emergency_relationship' => [
                'required',
                'string',
                'max:50',
            ],

            'emergency_mobile' => [
                'required',
                'regex:/^01[3-9]\d{8}$/',
            ],

            'emergency_email' => [
                'nullable',
                'email',
                'max:255',
            ],


            // Licensing & Examination
            'license_type' => [
                'required',
                'in:non_professional,professional',
            ],

            'instructor_license_no' => [
                'required',
                'string',
                'max:50',
            ],

            'exam_venue' => [
                'required',
                'string',
                'max:100',
            ],

            'vehicle_class' => [
                'required',
                'array',
                'min:1',
            ],

            'vehicle_class.*' => [
                'string',
                'in:motorcycle,light',
                'distinct',
            ],


            // Attachments
            'applicant_photo' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],

            'nid_document' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png,pdf',
                'max:5120',
            ],

            'medical_certificate' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,pdf',
                'max:5120',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Upload Files
        |--------------------------------------------------------------------------
        */

        $photoPath = $request
            ->file('applicant_photo')
            ->store('applications/photos', 'public');


        $nidDocumentPath = $request
            ->file('nid_document')
            ->store('applications/nid-documents', 'public');


        $medicalCertificatePath = null;

        if ($request->hasFile('medical_certificate')) {

            $medicalCertificatePath = $request
                ->file('medical_certificate')
                ->store('applications/medical-certificates', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Generate Application Number
        |--------------------------------------------------------------------------
        */

        $applicationNo = 'LL-' .
            now()->format('Y') .
            '-' .
            strtoupper(Str::random(6));


        /*
        |--------------------------------------------------------------------------
        | Save Application  
        |--------------------------------------------------------------------------
        */

        $application = Application::create([
            ...$validated,

            'user_id' => auth()->id(),

            'application_no' => $applicationNo,
            'applicant_photo' => $photoPath,
            'nid_document' => $nidDocumentPath,
            'medical_certificate' => $medicalCertificatePath,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Success Response
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('application.success', $application)
            ->with('success', 'Application submitted successfully!');
    }

    public function success(Application $application)
    {
        Gate::authorize('view', $application);

        return view('registration.success', compact('application'));
    }

    public function license(Application $application)
    {
        Gate::authorize('view', $application);

        return view('registration.license', compact('application'));
    }

    public function licensePdf(Application $application)
    {
        Gate::authorize('view', $application);

        abort_unless($application->status === 'approved', 403);

        $pdf = Pdf::loadView('registration.license-pdf', [
            'application' => $application,
        ]);

        $pdf->setPaper('A4', 'landscape');

        return $pdf->download(
            'Learner-License-' . $application->application_no . '.pdf'
        );
    }
}
