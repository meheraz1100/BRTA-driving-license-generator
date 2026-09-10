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
}