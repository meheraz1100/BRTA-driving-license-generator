<?php

namespace App\Mail;

use App\Models\Application;
use App\Services\LicenseCardPdf;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Application $application) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your learner license has been approved',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.application-approved',
        );
    }

    /**
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        $pdf = app(LicenseCardPdf::class)->render($this->application);

        return [
            Attachment::fromData(
                fn(): string => $pdf,
                'learner-license-' . $this->application->application_no . '.pdf',
            )->withMime('application/pdf'),
        ];
    }
}
