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
}
