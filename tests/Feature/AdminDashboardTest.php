<?php

namespace Tests\Feature;

use App\Models\Application;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_see_submitted_applications(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $user = User::factory()->create([
            'role' => 'user',
        ]);

        Application::factory()->create([
            'user_id' => $user->id,
            'application_no' => 'LL-2026-TEST01',
            'name_english' => 'Test Applicant',
        ]);

        $response = $this
            ->actingAs($admin)
            ->get('/admin');

        $response->assertOk();

        $response->assertSee('LL-2026-TEST01');
        $response->assertSee('Test Applicant');
    }


    public function test_admin_dashboard_only_shows_actions_for_pending_applications(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $pendingApplication = Application::factory()->create([
            'status' => 'pending',
        ]);

        $approvedApplication = Application::factory()->create([
            'status' => 'approved',
        ]);

        $rejectedApplication = Application::factory()->create([
            'status' => 'rejected',
            'rejection_reason' => 'Invalid information.',
        ]);

        $response = $this->actingAs($admin)
            ->get(route('admin.dashboard'));

        $response->assertOk();

        $response->assertSee('Approve');

        $response->assertSee('Reject');

        $response->assertSee($pendingApplication->application_no);
        $response->assertSee($approvedApplication->application_no);
        $response->assertSee($rejectedApplication->application_no);
    }
}
