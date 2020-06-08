<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "name" => ["required","min:3","max:25"],
            "username" => ["required","min:3","max:25","unique:users,username"],
            "email" => ["required","email","min:5","max:25","unique:users,email"],
            "password" => ["required","min:5","max:25"]
        ];
    }
}
