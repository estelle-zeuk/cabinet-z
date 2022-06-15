<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'enterprise';

    protected $guarded = [
       'id'
    ];

    public function country(){
        return $this->belongsTo('App\Models\Countries','country_id');
    }

}
