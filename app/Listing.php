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
        'description',
        'street_address',
        'city',
        'state_id',
        'zip',
        'contact_email',
        'company_email',
        'phone',
        'website',
        'display_contact',
        'tag_id'
    ];

    protected $casts = [
        'is_approved' => 'boolean'
    ];

    protected $appends = [
        'state_name',
        'category_id'
    ];

    /**
     * @return mixed
     */
    public function getStateNameAttribute()
    {
        return State::where('id', $this->state_id)->first()->name;
    }

    public function getCategoryIdAttribute()
    {
        return $this->categories()->first()->id ?? null;
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'listing_category');
    }

    public function scopeWhereCategory($query, $category)
    {
        return $query->whereHas('categories', function ($q) use ($category) {
            $q->where('slug', '=', $category);
        });
    }
}
