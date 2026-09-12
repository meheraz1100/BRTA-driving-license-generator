<?php

namespace Tests\Feature;

use App\Mail\ApplicationApprovedMail;
use App\Models\Application;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ApplicationApprovalMailTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_approval_sends_approved_email(): void
    {
        Mail::fake();

        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $user = User::factory()->create();

        $application = Application::factory()->create([
            'user_id' => $user->id,
            'status' => 'pending',
            'email' => $user->email,
        ]);

        $this->actingAs($admin)
            ->post(route('admin.applications.approve', $application));

        Mail::assertSent(
            ApplicationApprovedMail::class,
            function (ApplicationApprovedMail $mail) use ($application) {
                return $mail->application->id === $application->id;
            }
        );
    }


    public function test_approved_email_contains_license_pdf_attachment(): void
    {
        $user = User::factory()->create();

        $application = Application::factory()->create([
            'user_id' => $user->id,
            'status' => 'approved',
            'email' => $user->email,
        ]);

        $mail = new ApplicationApprovedMail($application);

        $attachments = $mail->attachments();

        $this->assertCount(1, $attachments);

        $this->assertInstanceOf(
            \Illuminate\Mail\Mailables\Attachment::class,
            $attachments[0]
        );
    }
}
