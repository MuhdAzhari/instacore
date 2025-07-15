<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Barryvdh\DomPDF\Facade\Pdf;

class AuditPdfExportController extends Controller
{
    public function __invoke()
    {
        $audits = Audit::with('user')->latest()->get();

        $pdf = Pdf::loadView('audits.pdf', compact('audits'));
        return $pdf->download('audit-logs-' . now()->format('Y-m-d_H-i-s') . '.pdf');
    }
}
