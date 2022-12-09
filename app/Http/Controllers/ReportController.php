<?php
namespace App\Http\Controllers;
use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;
class ReportController extends Controller
{

    public function export() 
    {
        return Excel::download(new ReportExport() , 'report.xlsx');
    }
    
}