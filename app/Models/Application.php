<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'application_no',

        // Personal Information
        'nid',
        'date_of_birth',
        'name_english',
        'name_bangla',
        'father_name_english',
        'father_name_bangla',
        'mother_name_english',
        'mother_name_bangla',
        'gender',
        'marital_status',
        'spouse_name_english',
        'spouse_name_bangla',
        'occupation',
        'blood_group',

        // Present Address
        'present_village',
        'present_road',
        'present_division',
        'present_district',
        'present_thana',
        'present_post_code',

        // Permanent Address
        'permanent_village',
        'permanent_road',
        'permanent_division',
        'permanent_district',
        'permanent_thana',
        'permanent_post_code',

        // Citizenship
        'nationality',
        'has_other_citizenship',
        'other_citizenship',

        // Applicant Contact
        'phone_residence',
        'mobile',
        'phone_office',
        'email',

        // Emergency Contact
        'emergency_name',
        'emergency_relationship',
        'emergency_mobile',
        'emergency_email',

        // Licensing & Examination
        'license_type',
        'instructor_license_no',
        'exam_venue',
        'vehicle_class',

        // Attachments
        'applicant_photo',
        'nid_document',
        'medical_certificate',
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'vehicle_class' => 'array',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'application_no';
    }
}