<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NavbarTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_sees_login_and_register_on_home_page(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('Login');
        $response->assertSee('Register');
        $response->assertDontSee('Logout');
        $response->assertDontSee('Admin Dashboard');
    }

    public function test_member_sees_application_links_and_logout_on_dashboard(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
        ]);

        $response = $this
            ->actingAs($user)
            ->get('/my-applications');

        $response->assertOk();
        $response->assertSee('My Applications');
        $response->assertSee('Apply');
        $response->assertSee('Logout');
        $response->assertDontSee('Admin Dashboard');
        $response->assertDontSee('Register');
    }

    public function test_admin_sees_admin_dashboard_link_and_logout(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this
            ->actingAs($admin)
            ->get('/admin');

        $response->assertOk();
        $response->assertSee('Admin Dashboard');
        $response->assertSee('Logout');
        $response->assertDontSee('My Applications');
        $response->assertDontSee('Register');
    }

    public function test_authenticated_member_does_not_see_guest_links_on_home_page(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
        ]);

        $response = $this
            ->actingAs($user)
            ->get('/');

        $response->assertOk();
        $response->assertSee('My Applications');
        $response->assertSee('Logout');
        $response->assertDontSee('>Register</a>', false);
        $response->assertDontSee('Admin Dashboard');
    }
}
