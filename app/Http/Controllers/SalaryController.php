<?php
namespace App\Http\Controllers;
use App\Mail\SalaryEmail;
use App\Mail\TestEmail;
use App\Models\Salary;
use Illuminate\Http\Request;
use App\Exports\SalaryExport;
use App\Imports\SalaryImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
class SalaryController extends Controller
{
    public function index()
    {
        $salary = Salary::all();
        return view('admin.salary.list',['salary'=>$salary]);
    }
    public function export() 
    {
        return Excel::download(new SalaryExport, 'salary.xlsx');
    }
    public function import() 
    {
        Excel::import(new SalaryImport,request()->file('file'));
        return back();
    }
    public function sendMail(Request $request,$email){
        $kq=DB::table('salary')
        ->select('salary.name as name','salary.email as email','salary.username as username', 'salary.salarymounth as mounth')->where('email',$email)
        ->first();
        $data = $request->all();
            $data['username'] = $kq->username;
            $data['salaryMounth'] = $kq->mounth;
            $data['name'] = $kq->name;
        $mailData = [
            'name'=>$data['name'],
            'username'=>$data['username'],
            'email'=>$email,
            'salarymounth'=>$data['salaryMounth']
        ];
        Salary::where('email', $email)
        ->update([
           'status' => 1
        ]);
        Mail::to($email)->send(new SalaryEmail($mailData));
        return view('admin.email.succes');
    }


}