<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        if(request()->route()->uri == 'user/{user}/edit'){
            return [
                'name' => ['required', 'min:8'],
                'email' => ['required', 'min:8','email', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,8}$/ix', \Illuminate\Validation\Rule::unique('users')->ignore($this->user()->id)],
            ];

        }
        return [
            'name' => ['required', 'min:8'],
            'email' => ['required', 'min:8','unique:users,email','email', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,8}$/ix'],
            'password' => ['required', 'min:8'],
            'password_confirmation' => ['required', 'min:8','same:password']
        ];
    }


    public function messages(){
        return[
            'nom.required' => "le champs nom est requis",
            'nom.min' => "le champs nom est trop court ",

            'email.required' => "le champs email est requis",
            'email.min' => "le champs email est trop court ",
            'email.email' => "Le format email est requis",
            'email.regex' => "Le format email est incorrect (regex)",
            'email' => ['required', 'min:8','unique:users, email','email', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,8}$/ix'],

            'password.required' => "le champs password est requis",
            'password.min' => "le champs password est trop court ",
            
            'password_confirmation.required' => "le champs de confirmation password est requis",
            'password_confirmation.min' => "le champs de confirmation password est trop court ",
            'password_confirmation.same' => "le champs de confirmation password doit etre indentique au password ",
        ];
    }
}
