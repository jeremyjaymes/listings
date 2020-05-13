<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Listing extends Model
{
    use Searchable;

    public $asYouType = true;

    protected $fillable = [
        'name',
        'street_address',
        'city',
        'state_id',
        'zip',
        'contact_email',
        'tag_id'
    ];

    protected $casts = [
        'is_approved' => 'boolean'
    ];

    protected $appends = [
        'state_name'
    ];

    /**
     * @return mixed
     */
    public function getStateNameAttribute()
    {
        return State::where('id', $this->state_id)->first()->name;
    }

    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = preg_replace("/[^0-9]/", "", $value);
    }

    public function getPhoneAttribute($value)
    {
        return preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "($1) $2-$3", $value);
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();
        return $array;
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'listing_category');
    }
}
