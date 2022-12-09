<?php
namespace App\Http\Controllers;

use App\Models\Later;
use Illuminate\Support\Facades\DB;
use Psr\Http\Message\RequestInterface;
use Symfony\Component\HttpFoundation\Request;

class UserLaterController extends Controller
{
    public function list()
    {
        return view('admin.latemanagelist.index', [
            'listlater' => DB::table('users')->join('later', function ($join) {
                $join->on('later.users_id', '=', 'users.id')->where('later.status', 2);
            })->paginate(5)
        ]);
    }
    public function index()
    {
        $users_id = auth()->user()->id;
        $result = Later::where('users_id', $users_id)->paginate(5);
        return view('useraccount.latemanagelist.user.index', [
            'listlater' => $result
        ]);
    }
    public function create()
    {
        return view('latemanagelist.admin.create');
    }
    public function userNewLate(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('useraccount.latemanagelist.user.create');
        } else if ($request->isMethod('post')) {
            $data = $request->all();
            $data['users_id'] = auth()->user()->id;
            $kq = DB::table('reasons')
                ->select('id')->where('category', $data['category'])
                ->get();
            foreach ($kq as $item) {
                $data['reason_id'] = $item->id;
            }
            $newLate = Later::create([
                'category' => $data['category'],
                'reason' => $data['reason'],
                'date' => $data['date'],
                'requestlate' => 1,
                'users_id' => $data['users_id'],
                'reason_id' => $data['reason_id'],
            ]);
            return redirect('/useraccount-late');
        }
    }
    public function userNewBreak(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('useraccount.latemanagelist.user.break');
        } else if ($request->isMethod('post')) {
            $data = $request->all();
            $data['users_id'] = auth()->user()->id;
            $kq = DB::table('reasons')
                ->select('id')->where('category', $data['category'])
                ->get();
            foreach ($kq as $item) {
                $data['reason_id'] = $item->id;
            }
            $newLate = Later::create([
                'category' => $data['category'],
                'reason' => $data['reason'],
                'date' => $data['date'],
                'datebreak' => $data['datebreak'],
                'users_id' => $data['users_id'],
                'reason_id' => $data['reason_id'],
            ]);
            return redirect('/useraccount-late');
        }
    }
    public function sendReason(Request $request,$id){
        Later::where('id', $id)
            ->update([
                'status' => 1
            ]);
        return redirect('/useraccount-late');
    }
    public function search(Request $request)
    {
        $data = $request->all();
        $username = $data['search'];
        return view('admin.search.userlate', [
            'listlater' => DB::table('users')->join('later', 'users.id', '=', 'later.users_id')
                ->select('users.name as name', 'users.username as username', 'later.id as id', 'later.category as category', 'later.reason as reason', 'later.datebreak as datebreak', 'later.date as date')
                ->where('status', 1)->where('username', 'like', '%' . $username . '%')->paginate(5),
            'username' => $username
        ]);
    }
    public function searchByDate(Request $request)
    {
        $data = $request->all();
        $date = $data['search'];
        return view('admin.search.userlate', [
            'listlater' => DB::table('users')->join('later', 'users.id', '=', 'later.users_id')
                ->select('users.name as name', 'users.username as username', 'later.id as id', 'later.category as category', 'later.reason as reason', 'later.datebreak as datebreak', 'later.date as date')
                ->where('status', 1)->where('date', 'like', '%' . $date . '%')->paginate(5),
            'username' => $date
        ]);
    }
    public function edit(Request $request, $id)
    {
        return view('admin.latemanagelist.edit', [
            'items' => DB::table('users')->join('later', 'users.id', '=', 'later.users_id')
                ->select('users.name as name', 'later.id as id', 'later.category as category', 'later.reason as reason', 'later.datebreak as datebreak')
                ->where('later.id', $id)->where('later.status', 2)->paginate(5)
        ]);
    }
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $later = Later::find($id);
        $later->category = $requestData['category'];
        $later->reason = $requestData['reason'];
        $later->datebreak = $requestData['datebreak'];
        $later->save();
        return redirect('/listlate');
    }
    public function requestLater()
    {
        return view('admin.createlater.index', [
            'later' => DB::table('users')->join('later', function ($join) {
                $join->on('users.id', '=', 'later.users_id')->where('later.status', 1);
            })->paginate(5)
        ]);
    }
    public function acceptLater(Request $request, $id)
    {
        Later::where('id', $id)
            ->update([
                'status' => 2
            ]);
        return redirect('/requestLater');
    }
    public function delete($id)
    {
        Later::where('id', $id)
            ->update([
                'status' => 3
            ]);
        return redirect('/listlate');
    }
}