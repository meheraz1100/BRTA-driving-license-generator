<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Application>
 */
class ApplicationFactory extends Factory
{
    protected $model = Application::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'status' => 'pending',

            'application_no' => 'LL-' . fake()->year() . '-' . strtoupper(fake()->bothify('??????')),

            'nid' => fake()->numerify('############'),
            'date_of_birth' => fake()->date(),

            'name_english' => fake()->name(),
            'name_bangla' => 'টেস্ট আবেদনকারী',

            'father_name_english' => fake()->name('male'),
            'father_name_bangla' => 'টেস্ট পিতা',

            'mother_name_english' => fake()->name('female'),
            'mother_name_bangla' => 'টেস্ট মাতা',

            'gender' => 'male',
            'marital_status' => 'single',

            'spouse_name_english' => null,
            'spouse_name_bangla' => null,

            'occupation' => 'Student',
            'blood_group' => 'O+',

            'present_village' => 'Test Village',
            'present_road' => 'Test Road',
            'present_division' => 'Chattogram',
            'present_district' => 'Feni',
            'present_thana' => 'Feni Sadar',
            'present_post_code' => '3900',

            'permanent_village' => 'Test Village',
            'permanent_road' => 'Test Road',
            'permanent_division' => 'Chattogram',
            'permanent_district' => 'Feni',
            'permanent_thana' => 'Feni Sadar',
            'permanent_post_code' => '3900',

            'nationality' => 'Bangladeshi',
            'has_other_citizenship' => 'no',
            'other_citizenship' => null,

            'phone_residence' => null,
            'mobile' => '01712345678',
            'phone_office' => null,
            'email' => fake()->safeEmail(),

            'emergency_name' => fake()->name(),
            'emergency_relationship' => 'Brother',
            'emergency_mobile' => '01812345678',
            'emergency_email' => null,

            'license_type' => 'non_professional',
            'instructor_license_no' => 'INS-12345',
            'exam_venue' => 'Feni',
            'vehicle_class' => ['motorcycle'],

            'applicant_photo' => 'applications/photos/test.jpg',
            'nid_document' => 'applications/nid-documents/test.pdf',
            'medical_certificate' => null,
        ];
    }
}