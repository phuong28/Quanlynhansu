<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
// Route::middleware(['auth'])->group(function () {
// });
Route::middleware(['auth','user-role:user'])->group(function()
{
    Route::get("/home",[App\Http\Controllers\HomeController::class,'index'])->name('home');
    Route::get("/useraccount-late",[App\Http\Controllers\UserLaterController::class,'index'])->name('useraccount.late');
    Route::match(['get', 'post'], '/useraccount-create-late',  [App\Http\Controllers\UserLaterController::class , 'usernewLate'])->name('useraccount.late.new');
    Route::match(['get', 'post'], '/useraccount-create-break',  [App\Http\Controllers\UserLaterController::class , 'userNewBreak'])->name('useraccount.break.create');
    Route::get("/send-reason/{id}",[App\Http\Controllers\UserLaterController::class,'sendReason'])->name('send.reason');
});
Route::middleware(['auth','user-role:admin'])->group(function()
{
    Route::get("/admin/home",[App\Http\Controllers\HomeController::class,'indexadmin'])->name('home.admin');
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class , 'index'])->name('dashboard');
    Route::get('/list', [App\Http\Controllers\UserController::class , 'list'])->name('user.list');
    Route::get('/create', [App\Http\Controllers\UserController::class , 'create'])->name('user.create');
    Route::post('/createuser', [App\Http\Controllers\UserController::class , 'store'])->name('create.user');
    Route::get('/edit/{id}', [App\Http\Controllers\UserController::class , 'edit'])->name('user.edit');
    Route::post('/update/{id}', [App\Http\Controllers\UserController::class , 'update'])->name('user.update');
    Route::get('delete/{id}', [App\Http\Controllers\UserController::class , 'destroy'])->name('delete.user');
    Route::get('/no-follow/{id}', [App\Http\Controllers\UserController::class, 'noFollow'])->name('user.follow');
    Route::get('/listlate', [App\Http\Controllers\UserLaterController::class , 'list'])->name('admin.list.late');
    Route::get('/createlist', [App\Http\Controllers\UserLaterController::class , 'create'])->name('admin.create.late');
    Route::get('/editlater/{id}', [App\Http\Controllers\UserLaterController::class , 'edit'])->name('admin.edit.late');
    Route::post('/updatelater/{id}', [App\Http\Controllers\UserLaterController::class , 'update'])->name('admin.update.late');
    Route::get('/deletelater/{id}', [App\Http\Controllers\UserLaterController::class , 'delete'])->name('admin.delete.late');
    Route::get('/listreason', [App\Http\Controllers\ReasonController::class , 'list'])->name('admin.reason.list');
    Route::get('/createreason', [App\Http\Controllers\ReasonController::class , 'create'])->name('admin.reason.create');
    Route::post('/addreason', [App\Http\Controllers\ReasonController::class , 'add'])->name('admin.reason.add');
    Route::get('deletereason/{id}', [App\Http\Controllers\ReasonController::class , 'delete'])->name('admin.delete.reason');
    Route::get('/editreason/{id}', [App\Http\Controllers\ReasonController::class , 'edit'])->name('admin.edit.reason');
    Route::post('/updatereason/{id}', [App\Http\Controllers\ReasonController::class , 'update'])->name('admin.reason.update');
    Route::get('/requestLater', [App\Http\Controllers\UserLaterController::class , 'requestLater'])->name('admin.request.late');
    Route::get('/acceptlater/{id}', [App\Http\Controllers\UserLaterController::class , 'acceptLater'])->name('admin.accept.late');
    Route::get('/searchuser', [App\Http\Controllers\UserController::class , 'search'])->name('searchuser');
    Route::get('/search-late', [App\Http\Controllers\ReasonController::class , 'search'])->name('search.late');
    Route::get('/search-list-late-by-user', [App\Http\Controllers\UserLaterController::class , 'search'])->name('search.user.late');
    Route::get('/search-user-late-by-date', [App\Http\Controllers\UserLaterController::class , 'searchByDate'])->name('search.user.late.by.date');
    Route::get('/salary', [App\Http\Controllers\SalaryController::class, 'index'])->name('users.salary');
    Route::post('/salary-import', [App\Http\Controllers\SalaryController::class, 'import'])->name('salary.import');
    Route::get('/salary-export', [App\Http\Controllers\SalaryController::class, 'export'])->name('salary.export');
    Route::get('/send-salary/{email}', [App\Http\Controllers\SalaryController::class, 'sendMail'])->name('send.salary');
    Route::get('/report', [App\Http\Controllers\ReportController::class, 'export'])->name('report');
    Route::get('/salary-user-export', [App\Http\Controllers\UserController::class, 'export'])->name('salary.user.export');
});
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class , 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class , 'login'])->name('user.login');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class , 'logout'])->name('logout');
// Route::get('/linkpassword', [App\Http\Controllers\Auth\UserController::class , 'linkpassword'])->name('linkpassword');
// Route::post('/post', [App\Http\Controllers\Auth\UserController::class , 'linkpassword'])->name('linkpassword');
Route::match(['get', 'post'], '/general-password',  [App\Http\Controllers\UserController::class , 'generalPassword'])->name('generalPassword');
