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

class ReportBreakExport implements FromCollection, WithHeadings, WithTitle
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
            ->select('users.name as name', 'users.username as username', 'later.category as category', 'later.reason as reason', 'later.date as date', DB::raw('(CASE WHEN later.datebreak = 1 THEN "nghỉ nửa ngày" ELSE "nghỉ cả ngày" END) AS datebreak'))
            ->where('later.status', 2)->where('datebreak', 1)->orWhere('datebreak', 2)->get();
    }
    public function map($row): array
    {
        // $row->songaynghi = 'nghỉ nửa ngày';
        // if($row->songaynghi==2){
        //     $row->songaynghi = 'nghỉ cả ngày';
        // }
        // dd($row->songaynghi);
        return [
            $row->name,
            $row->username,
            $row->category,
            $row->reason,
            $row->date,
            $row->datebreak
        ];
    }

    public function headings(): array
    {
        return [
            'Họ và tên',
            'Tài khoản',
            'Phân loại lý do',
            'Lý do',
            'Ngày xin phép',
            'Số ngày nghỉ'
        ];
    }

    public function title(): string
    {
        return 'Xin nghỉ';
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