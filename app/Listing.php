<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
        'name',
        'street_address',
        'city',
        'state_id',
        'zip',
        'contact_email',
        'tag_id'
    ];
}
