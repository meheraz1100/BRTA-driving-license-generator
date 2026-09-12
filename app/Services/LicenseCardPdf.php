<?php

namespace App\Services;

use App\Models\Application;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Picqer\Barcode\BarcodeGeneratorSVG;

class LicenseCardPdf
{
    public function render(Application $application): string
    {
        $barcodeData = $this->barcodeData($application);

        return Pdf::loadView('pdf.license-card', [
            'application' => $application,
            'issuedAt' => now(),
            'expiresAt' => now()->addYears(3),
            'photoDataUri' => $this->publicFileDataUri($application->applicant_photo),
            'brtaLogoDataUri' => $this->publicFileDataUri('asset/images/brta-logo.png'),
            'flagDataUri' => $this->publicFileDataUri('asset/images/bd.png'),
            'simDataUri' => $this->publicFileDataUri('asset/images/sim.png'),
            'vehicleClassDataUri' => $this->publicFileDataUri('asset/images/v-class.jpg'),
            'barcodeSvg' => $this->barcodeSvg($barcodeData),
        ])->setPaper('a4')->output();
    }

    public function barcodeData(Application $application): string
    {
        return $application->application_no
            .' | '
            .$application->present_village
            .($application->present_road ? ', '.$application->present_road : '')
            .', '.$application->present_thana
            .', '.$application->present_district
            .', '.$application->present_division
            .' - '.$application->present_post_code;
    }

    private function publicFileDataUri(?string $path): ?string
    {
        if ($path === null || $path === '') {
            return null;
        }

        if (! Storage::disk('public')->exists($path)) {
            return null;
        }

        $contents = Storage::disk('public')->get($path);
        $mime = Storage::disk('public')->mimeType($path) ?: 'image/png';

        return 'data:'.$mime.';base64,'.base64_encode($contents);
    }

    private function barcodeSvg(string $barcodeData): string
    {
        $generator = new BarcodeGeneratorSVG;

        try {
            return $generator->getBarcode($barcodeData, $generator::TYPE_CODE_128, 2, 55);
        } catch (\Throwable) {
            return $generator->getBarcode(
                explode(' | ', $barcodeData)[0],
                $generator::TYPE_CODE_128,
                2,
                55,
            );
        }
    }
}
