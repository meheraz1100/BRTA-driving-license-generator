<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThemePreferenceTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_switch_to_dark_mode_from_the_navbar(): void
    {
        $response = $this
            ->from('/')
            ->post('/theme', [
                'theme' => 'dark',
            ]);

        $response->assertRedirect('/');
        $response->assertSessionHas('theme', 'dark');

        $home = $this
            ->withSession(['theme' => 'dark'])
            ->get('/');

        $home->assertOk();
        $home->assertSee('class="dark"', false);
        $home->assertSee('Switch to light mode');
    }

    public function test_guest_can_switch_back_to_light_mode(): void
    {
        $response = $this
            ->from('/')
            ->withSession(['theme' => 'dark'])
            ->post('/theme', [
                'theme' => 'light',
            ]);

        $response->assertRedirect('/');
        $response->assertSessionHas('theme', 'light');

        $home = $this
            ->withSession(['theme' => 'light'])
            ->get('/');

        $home->assertOk();
        $home->assertDontSee('class="dark"', false);
        $home->assertSee('Switch to dark mode');
    }

    public function test_invalid_theme_value_is_rejected(): void
    {
        $response = $this
            ->from('/')
            ->post('/theme', [
                'theme' => 'neon',
            ]);

        $response->assertRedirect('/');
        $response->assertSessionHasErrors('theme');
    }
}
