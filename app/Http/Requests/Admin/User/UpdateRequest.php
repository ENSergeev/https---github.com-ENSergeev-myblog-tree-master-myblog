<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        // dd($this->email);
        $ind =$this->user_id;
        // dd($ind);
        return [
            'name'=>'required|string',
            // 'email'=>'required|string|email',
            // 'email'=>'required|string|email|unique:users,email,15',
            'email'=>'required|string|email|unique:users,email,'.$this->user_id,
            // 'email'=>'required|string|email|unique:users,email, $this->user_id',
            'user_id'=>'required|integer|exists:users,id',
            'role' =>'required|integer',
        ];
    }
    public function messages() {
      return[
        'name.required'=>'Это поле необхдимо для заполнения',
        'name.string'=>'Имя должно быть строкой',
        'email.required'=>'Это поле необхдимо для заполнения',
        'email.string'=>'Почта должна быть строкой',
        'email.email'=>'Ваша почта должна соответствовать формату mail@some.domain',
        'email.unique'=>'Пользователь с таким email уже существует',
      ];
    }
}
