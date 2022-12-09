<?php
namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithMapping;

class ReportLateExport implements FromCollection, WithHeadings, WithTitle
{

    public function __construct()
    {
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('users')->join('later', 'users.id', '=', 'later.users_id')
        ->select('users.name as name', 'users.username as username',  'later.category as category', 'later.reason as reason', 'later.date as date')
        ->where('later.status', 2)->where('requestlate',1)->get();
    }
    public function map($row): array
    {

        return [
            $row->name,
            $row->username,
            $row->category,
            $row->reason,
            $row->date
        ];
    }

    public function headings(): array
    {
        return [
            'Họ và tên',
            'Tài khoản',
            'Phân loại lý do',
            'Lý do',
            'Ngày xin phép'
        ];
    }

    public function title(): string
    {
        return 'Xin đến muộn';
    }

    // public function columnFormats(): array
    // {
    //     return [
    //         'B' => '#,##0',
    //         'C' => '#,##0',
    //         'D' => NumberFormat::FORMAT_PERCENTAGE_00
    //     ];
    // }
}
