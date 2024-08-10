<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Option;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $properties = Property::paginate();

        return view('property.index', compact('properties'))
            ->with('i', ($request->input('page', 1) - 1) * $properties->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $property = new Property();
        $allOptions = Option::pluck('name', 'id');

        return view('property.create', compact('property', 'allOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $request): RedirectResponse
    {
    
    
        // Créer une nouvelle propriété avec les données validées
        $property = Property::create($request->validated());
    
        // Synchronisation des options
        $property->options()->sync($request->input('options'));
    
        // Vérification si une nouvelle image a été téléchargée
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('property', 'public'); // Enregistre dans storage/app/public/property
            $property->image = $imagePath; // Enregistre uniquement le chemin relatif dans la base de données
            $property->save(); // Assurez-vous de sauvegarder l'objet Property après modification
        }
    
        return Redirect::route('properties.index')
            ->with('success', 'Property created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $property = Property::findOrFail($id); // Utiliser findOrFail pour gérer les erreurs de non-trouvabilité

        return view('property.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property): View
    {
        $allOptions = Option::pluck('name', 'id'); 
        return view('property.edit', compact('property', 'allOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyRequest $request, Property $property): RedirectResponse
    {
       
    
        // Synchronisation des options
        $property->options()->sync($request->input('options'));
    
        // Gestion de l'image si une nouvelle image est téléchargée
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($property->image) {
                Storage::disk('public')->delete($property->image);
            }
    
            $file = $request->file('image');
            $path = $file->store('property', 'public'); // Enregistre le nouveau fichier
            $property->image = $path; // Met à jour le chemin de l'image
        }
    
        // Mettre à jour les autres champs
        $property->update($request->except('image')); // Exclure l'image de la mise à jour
    
        return Redirect::route('properties.index')
            ->with('success', 'Property updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $property = Property::findOrFail($id);

        // Supprimer l'image associée si elle existe
        if ($property->image) {
            Storage::disk('public')->delete($property->image);
        }

        $property->delete();

        return Redirect::route('properties.index')
            ->with('success', 'Property deleted successfully');
    }
}
