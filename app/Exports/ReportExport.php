<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ReportExport implements WithMultipleSheets
{
    use Exportable;

    public function __construct()
    {
    }

    public function sheets(): array
    {
        $sheets = [
            new ReportLateExport(),
            new ReportBreakExport()
        ];
        return $sheets;
    }
}
