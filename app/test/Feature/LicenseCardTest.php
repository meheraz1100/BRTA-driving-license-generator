<?php

namespace Tests\Feature;

use App\Models\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LicenseCardTest extends TestCase
{
    use RefreshDatabase;

    public function test_license_card_page_displays_application_information(): void
    {
        $application = Application::factory()->create([
            'application_no' => 'LL-2026-ABC123',
            'name_english' => 'Md Meheraz Islam',
            'date_of_birth' => '2005-09-04',
            'father_name_english' => 'Md Father Name',
            'blood_group' => 'B+',
            'license_type' => 'non_professional',
            'vehicle_class' => ['motorcycle', 'light'],
        ]);

        $response = $this->get(
            route('application.license', $application)
        );

        $response
            ->assertOk()
            ->assertSee('LL-2026-ABC123')
            ->assertSee('Md Meheraz Islam')
            ->assertSee('Md Father Name')
            ->assertSee('B+')
            ->assertSee('DEMO')
            ->assertSee('NOT A VALID DRIVING LICENCE');
    }
}