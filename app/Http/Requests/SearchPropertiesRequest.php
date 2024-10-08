<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchPropertiesRequest extends FormRequest
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
    public function rules(): array{
            return [
                'price' => ['nullable', 'integer', 'min:0'],
                'surface' => ['nullable', 'integer', 'min:0'],
                'rooms' => ['nullable', 'integer', 'min:0'],
                'bedrooms' => ['nullable', 'integer', 'min:0'],  // Ajouter cette ligne
                'title' => ['nullable', 'string'],
            ];
     }
        
    
}
