<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];

    protected $appends = ['approved_listings'];

    public function getApprovedListingsAttribute()
    {
        return Cache::remember("category-{$this->id}-count", 12*60, function () {
            return $this->listings->where('is_approved', true)->count();
        });
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = strtolower(str_replace(' ', '-', $value));
    }

    public function listings()
    {
        return $this->belongsToMany('App\Listing', 'listing_category');
    }
}
