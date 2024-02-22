<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class ApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

     protected function failedValidation(Validator $validator)
     {
        $resqponse = response()->json([
            'message' => 'Validator errors',
            'data' =>$validator->errors(),
        ], 422);
        throw new HttpResponseException($resqponse);
     }


}
