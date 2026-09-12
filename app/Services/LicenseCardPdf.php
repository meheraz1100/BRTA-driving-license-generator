<?php

namespace App\Services;

use App\Models\Application;
use Mpdf\Mpdf;

class LicenseCardPdf
{
    public function render(Application $application): string
    {
        $html = view('registration.license-pdf', [
            'application' => $application,
        ])->render();

        $tempDir = storage_path('app/mpdf');

        if (! is_dir($tempDir)) {
            mkdir($tempDir, 0755, true);
        }

        $mpdf = new Mpdf([
            'format' => 'A4',
            'mode' => 'utf-8',
            'tempDir' => $tempDir,
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 10,
        ]);

        $mpdf->WriteHTML($html);

        return $mpdf->Output('', 'S');
    }
}