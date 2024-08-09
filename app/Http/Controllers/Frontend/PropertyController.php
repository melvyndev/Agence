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
class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchPropertiesRequest $request): View
    {

        $query = Property::query();
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
        $property = Property::where('slug', $slug)->with('propertyImages')->firstOrFail();
        return view('frontend.property.show', compact('property'));
    }


}
