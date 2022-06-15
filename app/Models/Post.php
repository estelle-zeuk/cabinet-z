<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';

    protected $fillable = [
        'department_id', 'code','name','status','created_at','updated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function department(){
        return $this->belongsTo('App\Models\Department','department_id');
    }

    public function jobs()
    {
        return $this->hasMany('App\Models\Jobs');
    }
}
