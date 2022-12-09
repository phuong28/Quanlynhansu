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

class UserExport implements FromCollection,WithHeadings
{

    public function __construct()
    {
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('users')->select('users.name as name',  'users.email as email', 'users.username as username', 'users.phone as phone', 'users.level as level')->where('status','Đang làm')->get();
    }
    public function map($row): array
    {

        return [
            $row->name,
            $row->email,
            $row->username,
            $row->phone,
            $row->level
        ];
    }
    public function headings(): array
    {
        return [ "name", "email","username","phone","level"];
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
