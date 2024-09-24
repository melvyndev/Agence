<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubventionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nom_complet' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'type_agriculture' => 'required|string',
            'type_organisation' => 'required|string',
            'description_beneficiaire' => 'required|string',
            'surface_exploitation' => 'nullable|numeric',
            'type_plantes' => 'nullable|string',
            'nombre_animaux' => 'nullable|integer',
            'description_projet' => 'required|string',
            'montant_demande' => 'required|numeric',
            'piece_identite' => 'nullable|file|mimes:pdf,jpeg,png|max:2048'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
