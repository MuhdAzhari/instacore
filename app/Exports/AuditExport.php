<?php

namespace App\Exports;

use App\Models\Audit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AuditExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Audit::with('user')
            ->latest()
            ->get()
            ->map(function ($audit) {
                return [
                    'User' => $audit->user->name ?? 'System',
                    'Event' => $audit->event,
                    'Model' => $audit->auditable_type,
                    'Model ID' => $audit->auditable_id,
                    'Date' => $audit->created_at->toDateTimeString(),
                    'IP' => $audit->ip_address,
                    'URL' => $audit->url,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'User',
            'Event',
            'Model',
            'Model ID',
            'Date',
            'IP',
            'URL',
        ];
    }
}
