<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Option;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PropertyController extends Controller
{
    // Méthode d'index inchangée
    public function index(Request $request): View
    {
        $properties = Property::paginate();

        return view('property.index', compact('properties'))
            ->with('i', ($request->input('page', 1) - 1) * $properties->perPage());
    }

    // Méthode create inchangée
    public function create(): View
    {
        $property = new Property();
        $allOptions = Option::pluck('name', 'id');

        return view('property.create', compact('property', 'allOptions'));
    }

    // Méthode store mise à jour pour utiliser Cloudinary
    public function store(PropertyRequest $request): RedirectResponse
    {
        // Créer une nouvelle propriété avec les données validées
        $property = Property::create($request->validated());

        // Synchronisation des options
        $property->options()->sync($request->input('options'));

        // Vérification si une nouvelle image a été téléchargée
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Uploader l'image sur Cloudinary
            $uploadedFileUrl = Cloudinary::upload($image->getRealPath())->getSecurePath();

            // Enregistrer l'URL de l'image dans la base de données
            $property->image = $uploadedFileUrl;
            $property->save();
        }

        return Redirect::route('properties.index')
            ->with('success', 'Property created successfully.');
    }

    // Méthode show inchangée
    public function show($id): View
    {
        $property = Property::findOrFail($id); // Utiliser findOrFail pour gérer les erreurs de non-trouvabilité

        return view('property.show', compact('property'));
    }

    // Méthode edit inchangée
    public function edit(Property $property): View
    {
        $allOptions = Option::pluck('name', 'id');
        return view('property.edit', compact('property', 'allOptions'));
    }

    // Mise à jour de la méthode update pour utiliser Cloudinary
    public function update(PropertyRequest $request, Property $property): RedirectResponse
    {
        config(['cloudinary.cloud_url' => 'cloudinary://172419123468784:V3JpVZkrlwF12cUFzVie7DcqxpE@dgptr7qzw']);

        // Synchronisation des options
        $property->options()->sync($request->input('options'));

        // Gestion de l'image si une nouvelle image est téléchargée
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe sur Cloudinary
            if ($property->image) {
                Cloudinary::destroy($property->image);
            }

            $image = $request->file('image');
            $uploadedFileUrl = Cloudinary::upload($image->getRealPath())->getSecurePath();

            $property->image = $uploadedFileUrl; // Met à jour le chemin de l'image
        }

        // Mettre à jour les autres champs
        $property->update($request->except('image')); // Exclure l'image de la mise à jour

        return Redirect::route('properties.index')
            ->with('success', 'Property updated successfully.');
    }

    // Mise à jour de la méthode destroy pour supprimer les images de Cloudinary
    public function destroy($id): RedirectResponse
    {
        $property = Property::findOrFail($id);

        // Supprimer l'image associée sur Cloudinary si elle existe
        if ($property->image) {
            Cloudinary::destroy($property->image);
        }

        $property->delete();

        return Redirect::route('properties.index')
            ->with('success', 'Property deleted successfully');
    }
}
