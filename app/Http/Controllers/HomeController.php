<?php
namespace App\Http\Controllers;
class HomeController extends Controller
{
    public function index()
    {
        return view('useraccount.homepage.index');
    }
    public function indexadmin()
    {
        return view('admin.homepage.index');
    }

}
