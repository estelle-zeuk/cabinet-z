<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'name', 'state_id','longitude', 'latitude', 'state_code','country_id','country_code','region_id','created_at','updated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function region()
    {
        return $this->belongsTo('App\Models\Region', 'region_id');
    }
}
