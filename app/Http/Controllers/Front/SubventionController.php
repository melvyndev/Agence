<?php

namespace App\Http\Controllers\Front;

use App\Models\Subvention;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;
class SubventionController extends BaseController
{
    public function create()
    {
        return view('subventions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
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
            'piece_identite' => 'nullable|file|mimes:pdf,jpeg,png|max:2048' // Limite de 2MB
        ]);
    
        // Gestion du fichier
        if ($request->hasFile('piece_identite')) {
            $file = $request->file('piece_identite');
            $path = $file->store('identites', 'public');
            $request->merge(['piece_identite' => $path]);
        }
    
        Subvention::create($request->all());
    
        return redirect()->back()->with('success', 'Demande de subvention envoyée avec succès.');
    }
    
}
