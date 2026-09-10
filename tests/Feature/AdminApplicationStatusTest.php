<?php

namespace Tests\Feature;

use App\Models\Application;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminApplicationStatusTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_approve_pending_application(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $user = User::factory()->create([
            'role' => 'user',
        ]);

        $application = Application::factory()->create([
            'user_id' => $user->id,
            'status' => 'pending',
        ]);

        $response = $this
            ->actingAs($admin)
            ->post("/admin/applications/{$application->application_no}/approve");

        $response->assertRedirect();

        $this->assertDatabaseHas('applications', [
            'id' => $application->id,
            'status' => 'approved',
        ]);
    }

    public function test_admin_can_reject_pending_application_with_reason(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $user = User::factory()->create([
            'role' => 'user',
        ]);

        $application = Application::factory()->create([
            'user_id' => $user->id,
            'status' => 'pending',
        ]);

        $response = $this
            ->actingAs($admin)
            ->post("/admin/applications/{$application->application_no}/reject", [
                'rejection_reason' => 'Required documents are incomplete.',
            ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('applications', [
            'id' => $application->id,
            'status' => 'rejected',
            'rejection_reason' => 'Required documents are incomplete.',
        ]);
    }


    public function test_admin_cannot_approve_already_rejected_application(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $user = User::factory()->create([
            'role' => 'user',
        ]);

        $application = Application::factory()->create([
            'user_id' => $user->id,
            'status' => 'rejected',
            'rejection_reason' => 'Required documents are incomplete.',
        ]);

        $response = $this
            ->actingAs($admin)
            ->post("/admin/applications/{$application->application_no}/approve");

        $response->assertForbidden();

        $this->assertDatabaseHas('applications', [
            'id' => $application->id,
            'status' => 'rejected',
            'rejection_reason' => 'Required documents are incomplete.',
        ]);
    }
}
