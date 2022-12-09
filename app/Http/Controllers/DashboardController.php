<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index()
    {
        $countUsers = DB::table('users')->where('status', 'đang làm')->get();
        $countUsersAll = DB::table('users')->get();
        return view('admin.dasboard.index',['quantityUsers'=>$countUsers,'userAll'=>$countUsersAll]);
    }

}
