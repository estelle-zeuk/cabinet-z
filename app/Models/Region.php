<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'region';

    protected $fillable = [
        'country_id','name_en_gb','name_fr_fr','iso2_en','iso2_fr',
    ];

    public function city(){

        return $this->hasMany('App\Models\City');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }
}
