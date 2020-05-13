<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function listings()
    {
        return $this->belongsToMany('App\Listing', 'listing_category');
    }
}
