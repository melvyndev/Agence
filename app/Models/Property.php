<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    // Specify the table if it differs from the default pluralized name
    protected $table = 'properties';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'title',
        'surface',
        'price',
        'description',
        'rooms',
        'bedrooms',
        'floor',
        'city',
        'address',
        'postal_code',
        'sold',
    ];

    // Optionally specify the attributes that should be cast to native types
    protected $casts = [
        'sold' => 'boolean',
    ];
    
}
