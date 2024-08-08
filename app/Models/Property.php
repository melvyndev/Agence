<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Property
 *
 * @property $id
 * @property $title
 * @property $description
 * @property $surface
 * @property $rooms
 * @property $bedrooms
 * @property $floor
 * @property $price
 * @property $city
 * @property $address
 * @property $postal_code
 * @property $sold
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Property extends Model
{
    
    protected $perPage = 20;
   
    protected $fillable = [
        'title', 'description', 'surface', 'rooms', 'bedrooms',
        'floor', 'price', 'city', 'address', 'postal_code', 'sold'
    ];

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class, 'option_property');
    }

}
