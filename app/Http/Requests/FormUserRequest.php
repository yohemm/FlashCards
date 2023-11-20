<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if(request()->route()->uri == 'login'){
            return [
                'email' => ['required', 'min:8','email', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,8}$/ix'],
                'password' => ['required', 'min:8'],
            ];

        }
        return [
            'name' => ['required', 'min:8'],
            'email' => ['required', 'min:8','unique:users,email','email', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,8}$/ix'],
            'password' => ['required', 'min:8'],
            'password_confirmation' => ['required', 'min:8','same:password']
        ];
    }
}
