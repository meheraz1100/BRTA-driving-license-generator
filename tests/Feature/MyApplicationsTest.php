<?php

namespace Tests\Feature;

use App\Models\Application;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MyApplicationsTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_view_my_applications_page(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
        ]);

        $response = $this
            ->actingAs($user)
            ->get('/my-applications');

        $response->assertOk();
        $response->assertSee('My Applications');
        $response->assertSee('No applications found');
        $response->assertSee('Create New Application');
    }

    public function test_user_can_see_own_application_on_my_applications_page(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
        ]);

        $application = Application::factory()->create([
            'user_id' => $user->id,
            'status' => 'pending',
            'application_no' => 'LL-2026-ABC123',
        ]);

        $response = $this
            ->actingAs($user)
            ->get('/my-applications');

        $response->assertOk();
        $response->assertSee('LL-2026-ABC123');
        $response->assertSee('Pending');
        $response->assertSee('View');
    }

    public function test_user_cannot_see_another_users_application(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
        ]);

        $otherUser = User::factory()->create([
            'role' => 'user',
        ]);

        Application::factory()->create([
            'user_id' => $otherUser->id,
            'application_no' => 'LL-2026-OTHER1',
        ]);

        $response = $this
            ->actingAs($user)
            ->get('/my-applications');

        $response->assertOk();
        $response->assertDontSee('LL-2026-OTHER1');
    }

    public function test_approved_application_shows_license_button(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
        ]);

        Application::factory()->create([
            'user_id' => $user->id,
            'status' => 'approved',
            'application_no' => 'LL-2026-APP123',
        ]);

        $response = $this
            ->actingAs($user)
            ->get('/my-applications');

        $response->assertOk();
        $response->assertSee('LL-2026-APP123');
        $response->assertSee('Approved');
        $response->assertSee('License');
    }

    public function test_rejected_application_shows_rejection_reason(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
        ]);

        Application::factory()->create([
            'user_id' => $user->id,
            'status' => 'rejected',
            'application_no' => 'LL-2026-REJ123',
            'rejection_reason' => 'Required documents are incomplete.',
        ]);

        $response = $this
            ->actingAs($user)
            ->get('/my-applications');

        $response->assertOk();
        $response->assertSee('Rejected');
        $response->assertSee('Required documents are incomplete.');
    }
}