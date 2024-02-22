<?php

namespace App\Http\Requests;

use App\Models\Card;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class ApiCardUpdateRequest extends ApiRequest
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
        return [
            'question' => ['min:10'],
            'answer' => ['min:8'],
            'slug' => ['min:8', 'regex:/^[0-9a-z\-]+$/'],
            'explication' => []
        ];
    }

    public function prepareForValidation()
    {
        if( $this->input('question')){
            $this->merge([
                'slug' => $this->input('slug') ?: \Str::slug($this->input('question'))
            ]);
        }
    }

}
