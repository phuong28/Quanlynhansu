<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => 'required|unique:users',
            'phone' => 'required|unique:users',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => ':attribute không được để đống',
            'username.unique' => ':attribute username đã tồn tại',
            'phone.required' => ':attribute không được để đống',
            'phone.unique' => ':attribute username đã tồn tại',
        ];
    }
    public function attributes()
    {
        return [
            'username' => 'Tài khoản',
            'phone' => 'số điện thoại'
        ];
    }
}