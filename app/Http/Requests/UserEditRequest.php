<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'email'=>'required|email',
            'roles'=>'required',
            'status'=>'required',
            'password'=>'min:6|nullable'
        ];
    }

    public function messages(){
        return[
            'name.required'=>'نام اجباری است',
            'email.required'=>'ایمیل اجباری است',
            'email.email'=>'ایمیل معتبر نمی باشد',
            'roles.required'=>'حداقل یک نقش انتخاب کنید',
            'status.required'=>'وضعیت اجباری است',
            'password.min'=>'رمزعبور باید حداقل 6 کاراکتر باشد',

        ];

    }
}
