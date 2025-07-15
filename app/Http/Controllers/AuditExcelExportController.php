<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AuditExport;

class AuditExcelExportController extends Controller
{
    public function __invoke(Request $request)
    {
        $fileName = 'audit-logs-' . now()->format('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new AuditExport, $fileName);
    }
}
