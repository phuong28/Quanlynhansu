<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ];
    }
    public function messages()
    {   
        $password= Hash::make('password');
        return [
            'username.required' => ':attribute không được để đống',
            "username.exists" => ":attribute không tồn tại",
            'password.required' => ':attribute không để trống',
            'password.min' => ':attribute tối thiểu 6 ký tự',
        ];
    }
    public function attributes()
    {
        return [
            'username' => 'Tên username',
            'password' => 'Mật khẩu'
        ];
    }
}
