<?php

namespace Tests\Feature;

use App\Models\Application;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LicensePdfTest extends TestCase
{
    use RefreshDatabase;

    public function test_approved_application_can_download_license_pdf(): void
    {
        $user = User::factory()->create();

        $application = Application::factory()->create([
            'user_id' => $user->id,
            'status' => 'approved',
        ]);

        $response = $this->actingAs($user)
            ->get(route('application.license.pdf', $application));

        $response->assertOk();

        $this->assertStringContainsString(
            'application/pdf',
            $response->headers->get('Content-Type')
        );
    }
}