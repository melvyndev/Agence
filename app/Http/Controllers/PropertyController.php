<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Option;

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

        return view('property.create', compact('property','allOptions'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $request): RedirectResponse
    {
        // Créer une nouvelle propriété avec les données validées
        $property = Property::create($request->validated());
    
        // Associer les options si présentes
        if ($request->has('options')) {
            $property->options()->sync($request->input('options'));
        }
    
        // Redirection avec un message de succès
        return Redirect::route('properties.index')
            ->with('success', 'Property created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $property = Property::find($id);

        return view('property.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        $allOptions = Option::all();
        return view('property.edit', compact('property', 'allOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyRequest $request, Property $property): RedirectResponse
    {
        $property->options()->sync($request->validated('options'));
        $property->update($request->validated());

        return Redirect::route('properties.index')
            ->with('success', 'Property updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Property::find($id)->delete();

        return Redirect::route('properties.index')
            ->with('success', 'Property deleted successfully');
    }
}
