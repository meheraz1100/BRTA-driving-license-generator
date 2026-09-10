<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ApplicationTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_application_is_linked_to_the_user(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
        ]);

        $response = $this
            ->actingAs($user)
            ->post('/application', [
                'nid' => '1234567890',
                'date_of_birth' => '2000-01-01',

                'name_english' => 'Test User',
                'name_bangla' => 'টেস্ট ইউজার',

                'father_name_english' => 'Test Father',
                'father_name_bangla' => 'টেস্ট ফাদার',

                'mother_name_english' => 'Test Mother',
                'mother_name_bangla' => 'টেস্ট মাদার',

                'gender' => 'male',
                'marital_status' => 'single',
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

                'mobile' => '01712345678',
                'email' => 'user@example.com',

                'emergency_name' => 'Emergency Person',
                'emergency_relationship' => 'Brother',
                'emergency_mobile' => '01812345678',

                'license_type' => 'non_professional',
                'instructor_license_no' => 'INS-12345',
                'exam_venue' => 'Feni',
                'vehicle_class' => ['motorcycle'],

                'applicant_photo' => UploadedFile::fake()->create('photo.jpg',100,'image/jpeg'),
                'nid_document' => UploadedFile::fake()->create(
                    'nid.pdf',
                    100,
                    'application/pdf'
                ),
            ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('applications', [
            'user_id' => $user->id,
            'name_english' => 'Test User',
        ]);
    }
}