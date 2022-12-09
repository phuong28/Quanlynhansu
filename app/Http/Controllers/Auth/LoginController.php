<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpFoundation\Request;
use Validator;
class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function username()
    {
        return 'username';
    }
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }

    /*
     |--------------------------------------------------------------------------
     | Login Controller
     |--------------------------------------------------------------------------
     |
     | This controller handles authenticating users for the application and
     | redirecting them to your home screen. The controller uses a trait
     | to conveniently provide its functionality to your applications.
     |
     */
    public function index(){
        return view("login.index");
    }
    // protected $redirectTo = RouteServiceProvider::HOME;
    /*
     |--------------------------------------------------------------------------
     | Login Controller
     |--------------------------------------------------------------------------
     |
     | This controller handles authenticating users for the application and
     | redirecting them to your home screen. The controller uses a trait
     | to conveniently provide its functionality to your applications.
     |
     */
    public function login(LoginRequest $request)
    {
        $request->validated();
        $data = $request->all();
        $user = User::where($this->username(), $request->username)->first();
        $validator = Validator::make([], []);
        if(auth()->attempt(['username'=>$data["username"], 'password'=>$data['password']]))
        {
            if(auth()->user()->role == 'admin')
            {
                return redirect()->route('home.admin');
            }
            else
            {
                return redirect()->route('home');
            }
        }
        else
        {
            if(!$user){
                $validator->errors()->add('password', __('Tài khoản không tồn tại.'));
                return redirect('/login')
                    ->withErrors($validator)
                    ->withInput();
            }
            if (!Hash::check($request->password, $user->password)) {
                $validator->errors()->add('password', __('Mật khẩu không chính xác.'));
                return redirect('/login')
                    ->withErrors($validator)
                    ->withInput();
            }
        }
        Auth::login($user, $request->get('remember'));
        $this->authenticated($request, $user);
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }

	/**
	 * @return mixed
	 */
	
	
}
