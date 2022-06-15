<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $guarded = [
                        'id'
                       ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
}
