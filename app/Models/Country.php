<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = [
        'name', 'iso3', 'iso2', 'phonecode', 'capital','currency','native', 'emoji','emojiU','flag','wikiDataId',
    ];

    public function region()
    {
    	/**
	    * Get the states for the country.
	    */
        return $this->hasMany('App\Models\Region');
    }
}
