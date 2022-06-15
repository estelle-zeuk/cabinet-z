<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'news_id', 'name', 'email', 'message','read','created_at','updated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function news()
    {
        return $this->belongsTo('App\Models\News', 'news_id');
    }

}
