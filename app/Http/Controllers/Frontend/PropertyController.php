<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Option;
use App\Http\Requests\SearchPropertiesRequest;
use App\Http\Requests\PropertyContactRequest;
use App\Mail\PropertyContactMail;
use Illuminate\Support\Facades\Mail;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchPropertiesRequest $request): View
    {
        // Créer une requête de base pour les propriétés
        $query = Property::query()->orderBy('created_at', 'desc');
    
        $query->when($request->validated('price', false), function ($q, $price) {
            return $q->where('price', '<=', $price);
        });
        
        $query->when($request->validated('surface', false), function ($q, $surface) {
            return $q->where('surface', '>=', $surface);
        });
        
        $query->when($request->validated('rooms'), function ($q, $rooms) {
            return $q->where('rooms', '>=', $rooms);
        });
        $query->when($request->validated('bedrooms'), function ($q, $bedrooms) {
            return $q->where('bedrooms', '>=', $bedrooms);
        });
        
        
        
        $query->when($request->validated('title', false), function ($q, $title) {
            return $q->where('title', 'like', "%$title%");
        });
    
        // Appliquer une portée (scope) si nécessaire, ici 'scopeAvailable'
        $query->available(true);
    
        // Retourner la vue avec les propriétés paginées et les paramètres de recherche
        return view('frontend.property.index', [
            'properties' => $query->paginate(16),
            'input' => $request->validated(),
        ]);
    }
    
    

 
    /**
     * Display the specified resource.
     */
    public function show(string $slug,Property $property): View
    {
        if($slug === $property->getSlug()){
            
        }
        $property = Property::where('slug', $slug)->firstOrFail();
        return view('frontend.property.show', compact('property'));
    }

    
    public function contact(Property $property, PropertyContactRequest $request): RedirectResponse
    {
        Mail::send(new PropertyContactMail($property, $request->validated()));
    
        return back()->with('success', 'Votre message a bien été envoyé');
    }
    


}
