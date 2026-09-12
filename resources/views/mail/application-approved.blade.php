<?php

namespace App\Mail;

use App\Models\Application;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Application $application
    ) {
    }

    public function build()
    {
        $pdf = Pdf::loadView('registration.license-pdf', [
            'application' => $this->application,
        ]);

        return $this
            ->subject('Your Learner License Application Has Been Approved')
            ->view('emails.application-approved')
            ->attachData(
                $pdf->output(),
                'Learner-License-' . $this->application->application_no . '.pdf',
                [
                    'mime' => 'application/pdf',
                ]
            );
    }
}