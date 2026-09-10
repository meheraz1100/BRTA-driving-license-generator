<?php

namespace Tests\Feature;

use App\Models\Application;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApplicationAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_cannot_view_another_users_application(): void
    {
        $owner = User::factory()->create([
            'role' => 'user',
        ]);

        $otherUser = User::factory()->create([
            'role' => 'user',
        ]);

        $application = Application::factory()->create([
            'user_id' => $owner->id,
        ]);

        $response = $this
            ->actingAs($otherUser)
            ->get("/application/{$application->application_no}/success");

        $response->assertForbidden();
    }


    public function test_admin_can_view_another_users_application(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $owner = User::factory()->create([
            'role' => 'user',
        ]);

        $application = Application::factory()->create([
            'user_id' => $owner->id,
        ]);

        $response = $this
            ->actingAs($admin)
            ->get("/application/{$application->application_no}/success");

        $response->assertOk();
    }

    public function test_user_cannot_view_another_users_license(): void
    {
        $owner = User::factory()->create([
            'role' => 'user',
        ]);

        $otherUser = User::factory()->create([
            'role' => 'user',
        ]);

        $application = Application::factory()->create([
            'user_id' => $owner->id,
        ]);

        $response = $this
            ->actingAs($otherUser)
            ->get("/application/{$application->application_no}/license");

        $response->assertForbidden();
    }


    public function test_owner_can_view_own_application_and_license(): void
    {
        $owner = User::factory()->create([
            'role' => 'user',
        ]);

        $application = Application::factory()->create([
            'user_id' => $owner->id,
        ]);

        $successResponse = $this
            ->actingAs($owner)
            ->get("/application/{$application->application_no}/success");

        $successResponse->assertOk();

        $licenseResponse = $this
            ->actingAs($owner)
            ->get("/application/{$application->application_no}/license");

        $licenseResponse->assertOk();
    }

    public function test_admin_cannot_reject_already_approved_application(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $user = User::factory()->create([
            'role' => 'user',
        ]);

        $application = Application::factory()->create([
            'user_id' => $user->id,
            'status' => 'approved',
        ]);

        $response = $this
            ->actingAs($admin)
            ->post("/admin/applications/{$application->application_no}/reject", [
                'rejection_reason' => 'Trying to reject an approved application.',
            ]);

        $response->assertForbidden();

        $this->assertDatabaseHas('applications', [
            'id' => $application->id,
            'status' => 'approved',
        ]);
    }
}
