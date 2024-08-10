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

        $query = Property::query()->orderBy('created_at','desc');
        if($request->validated('price')){
            $query = $query->where('price','<=', $request->input('price'));
        }
        if($request->validated('surface')){
            $query = $query->where('surface','>=', $request->input('surface'));
        }
        if($request->validated('rooms')){
            $query = $query->where('rooms','>=', $request->input('rooms'));
        }

        if($request->validated('title')){
            $query = $query->where('title','like',"%{$request->input('title')}%");
        }


        return view('frontend.property.index', ['properties'=> $query->paginate(16),'input'=>$request->validated()]);
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
