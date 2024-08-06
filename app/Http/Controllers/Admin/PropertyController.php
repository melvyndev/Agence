<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Property;
class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::orderBy('created_at','desc')->paginate(25);
        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();
        $property->fill(['surface' => 40, 'bedrooms' => 1, 'price' => 0, 'floor' => 0, 'rooms' => 1, 'sold' => false]);
        

        return view('admin.properties.form', compact('property'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        $data = $request->all();
            
        Property::create($data);
        
        return redirect()->route('admin.property.index')->with('success', 'La propriété a été enregistrée avec succes');
    }
    
    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
      
        return view('admin.properties.form',compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request,Property $property)
    {
        $data['sold'] = $request->has('sold') ? 1 : 0;

        $property->update($data);
        return redirect()->route('admin.property.index')->with('success', 'La propriété a été mise à jour avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('admin.property.index')->with('success', 'La propriété a été supprimé avec succes');

    }
}
