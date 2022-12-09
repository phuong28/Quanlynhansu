<?php
namespace App\Http\Controllers;
use App\Exports\UserExport;
use App\Http\Requests\UserRequest;
use App\Imports\SalaryImport;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Request;
use App\Exports\SalaryExport;
use Validator;

class UserController extends Controller 
{
    public function list()
    {
        return view('admin.user.index', [
            'users' => DB::table('users')->where('follow',0)->paginate(5)
        ]);
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function store(UserRequest $request)
    {
        $request->validated();
        $requestData = $request->all();
        $getImage= '';
	    if($request->hasFile('image')){
		//Hàm kiểm tra dữ liệu
		// $this->validate($request, 
		// 	[
		// 		//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
		// 		'hinhthe' => 'mimes:jpg,jpeg,png,gif|max:2048',
		// 	],			
		// 	[
		// 		//Tùy chỉnh hiển thị thông báo không thõa điều kiện
		// 		'hinhthe.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
		// 		'hinhthe.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
		// 	]
		// );
		
		//Lưu hình ảnh vào thư mục public/upload/hinhthe
            $image = $request->file('image');
            $getImage = time().'_'.$image->getClientOriginalName();
            $path = $image->storeAs('images', $getImage, 'public');
            $requestData["image"] = '/storage/'.$path;
            $image->move($requestData['image'], $getImage);
	    }
        $requestData['password']=Str::random(32);
        $generalPasswordToken = base64_encode($requestData['email'] . $requestData['password']);
        $user = User::create([
                    'name' => $requestData['name'],
                    'phone' => $requestData['phone'],
                    'date' => $requestData['date'],
                    'image' => $requestData['image'],
                    'username' => $requestData['username'],
                    'password' => Hash::make($requestData['password']),
                    'email' => $requestData['email'],
                    'level' => $requestData['level'],
                    'status' => $requestData['status'],
                    'general_password_token'=> $generalPasswordToken
        ]);
       
        $urlGeneral = route('generalPassword', ['token' => $generalPasswordToken]);
        $mailData = [
            'urlGeneral' => $urlGeneral, 
            'userName' => $requestData['username'],
            'password' => $requestData['password']
        ];
        Mail::to($requestData['email'])->send(new TestEmail($mailData));
        return redirect('/dashboard')->with('message', 'Nhân sự vừa được thêm thành công');
    }
    public function generalPassword(Request $request)
    {

        if ($request->isMethod('get')) {
            $token = $request->token;
            $user = User::where('general_password_token', $token)->first();
            if($user){
                if ($user->check_validate_password==0) {
                    return view('setpassword.index',['user'=>$user]);
                } else if ($user->check_validate_password == 1) {
                    return view('setpassword.warning');
                }
            }else{
                return abort('404');
            }
        } else if ($request->isMethod('post')) {
            $validate = Validator::make($request->all(), [
                'password' => 'required|confirmed',
            ]);
            if ($validate->fails()) {
                return back()->withErrors($validate->errors())->withInput();
            }
            else{
                $data = $request->all();
                $user=User::find($data['id']);
                $user->check_validate_password = 1;
                $user->password = Hash::make($data['password']);
                if($user->save()){
                    return view('setpassword.success');
                }
            }
        }
    }
    public function edit($id)
    {
        $user=User::find($id);
        return view('admin.user.edit',['user'=>$user]);
    }
    public function update(Request $request,$id){
        $requestData = $request->all();
        $getImage= '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
		    $getImage = time().'_'.$image->getClientOriginalName();
            $path = $image->storeAs('images', $getImage, 'public');
            $requestData["image"] = '/storage/'.$path;
		    $image->move($requestData['image'], $getImage);
        }
        $requestData['password']=Str::random(32);
        $user=User::find($id);
        $user->name=$requestData['name'];
        $user->phone= $requestData['phone'];
        $user->date= $requestData['date'];
        $user->image=$requestData['image'];
        $user->username=$requestData['username'];
        $user->password= Hash::make($requestData['password']);
        $user->email=$requestData['email'];
        $user->level=$requestData['level'];
        $user->status=$requestData['status'];
        $user->save();
        return redirect('/dashboard',)->with('message', 'Nhân sự vừa được thêm thành công');
    }
    public function destroy($id){
        $user=User::find($id);
        $user->delete();
        return redirect('/list');
    }
    public function noFollow(Request $request,$id){
        User::where('id', $id)
        ->update([
           'follow' => 1
        ]);
        return redirect('/list');
    }
    public function search(Request $request){
        $name = $request->search;
        $searchResult = User::where('name', 'like', '%'.$name.'%')->paginate(2);
        // dd($searchResult);
        return view('admin.search.index',['user'=>$searchResult, 'name'=>$name]);
    }
    public function export(){
        return Excel::download(new UserExport, 'users.xlsx');
    }
}