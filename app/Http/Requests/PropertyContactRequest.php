<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyContactRequest extends FormRequest
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
        $rules = [
            'firstname'=>['required', 'string', 'min:2'],
            'lastname'=>['required', 'string', 'min:2'],
            'phone'=>['required', 'string', 'min:10'],
            'email'=>['required', 'email', 'min:10'],
            'message'=>['required', 'string', 'min:4'],
            'g-recaptcha-response' => 'required|captcha',


        ];

        if (app()->environment('production')) {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }
        return $rules;

    }
    
    public function messages(): array
    {
        return [
            'g-recaptcha-response.required' => 'Verifie que vous ne soyez pas un robot',   
        ];
    }   
}
