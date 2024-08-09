<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class HomeController extends Controller
{
    public function index()
    {
        // Corrected the syntax for pagination
        $properties = Property::paginate(4);
        return view('frontend.home', compact('properties'));
    }

}
