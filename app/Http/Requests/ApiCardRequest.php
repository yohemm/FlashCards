<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class ApiCardRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

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
        // dd($this->request);
        return [
            'question' => ['required', 'min:10'],
            'answer' => ['required', 'min:8'],
            'slug' => ['required', 'min:8', 'regex:/^[0-9a-z\-]+$/'],
            'owner_id' => ['required', 'regex:/^[0-9]+$/'],
            'explication' => []
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'slug' => $this->input('slug') ?: \Str::slug($this->input('question')),
            'owner_id' => $this->input('owner_id') ?: Auth::user()->id
        ]);
    }

}
