<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;


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
        'floor', 'price', 'city', 'address', 'postal_code', 'sold','image'
    ];

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class, 'option_property');
    }

    public function getSlug(): string{
        return Str::slug($this->title);
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($property) {
            $property->slug = Str::slug($property->title);
        });

        static::updating(function ($property) {
            $property->slug = Str::slug($property->title);
        });
    }

    public function imageUrl()
    {
        return $this->image;
    }
    

    /**
     * Scope a query to only include available properties.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param bool $available
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAvailable(Builder $builder,bool $available = true): Builder
    {
        return $builder->where('sold',!$available);
    } 
    
}
