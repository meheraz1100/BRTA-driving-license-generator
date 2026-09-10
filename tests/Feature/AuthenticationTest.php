<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_an_account_with_user_role(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'user@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect('/application');

        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'email' => 'user@example.com',
            'role' => 'user',
        ]);
    }

    public function test_user_cannot_choose_admin_role_during_registration(): void
    {
        $this->post('/register', [
            'name' => 'Test User',
            'email' => 'user@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role' => 'admin',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'user@example.com',
            'role' => 'user',
        ]);
    }

    public function test_user_can_login_and_is_redirected_to_application(): void
    {
        User::factory()->create([
            'email' => 'user@example.com',
            'password' => 'password123',
            'role' => 'user',
        ]);

        $response = $this->post('/login', [
            'email' => 'user@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/my-applications');

        $this->assertAuthenticated();
    }

    public function test_admin_can_login_and_is_also_redirected_to_application(): void
    {
        User::factory()->create([
            'email' => 'admin@example.com',
            'password' => 'password123',
            'role' => 'admin',
        ]);

        $response = $this->post('/login', [
            'email' => 'admin@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/my-applications');

        $this->assertAuthenticated();
    }

    public function test_user_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post('/logout');

        $this->assertGuest();

        $response->assertRedirect('/login');
    }

    public function test_guest_cannot_access_application_form(): void
    {
        $response = $this->get('/application');

        $response->assertRedirect('/login');
    }
}