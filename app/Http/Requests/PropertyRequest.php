<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:8'],
            'description' => ['required', 'min:8'],
            'surface' => ['required', 'integer', 'min:10'],
            'rooms' => ['required', 'integer', 'min:1'],
            'bedrooms' => ['required', 'integer', 'min:0'],
            'floor' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'integer', 'min:0'],
            'city' => ['required', 'min:3'],
            'address' => ['required', 'min:8'],
            'postal_code' => ['required', 'digits:5'],
            'sold' => 'boolean', 
            'options' =>['array','exists:options,id','required'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Le champ :attribute est obligatoire',
            'min' => 'Le champ :attribute doit contenir au moins :min caractères',
            'digits' => 'Le champ :attribute doit contenir :digits chiffres',
            'integer' => 'Le champ :attribute doit contenir uniquement des chiffres',
            'boolean' => 'Le champ :attribute doit contenir uniquement des valeurs true ou false',
        ];
    }
}
