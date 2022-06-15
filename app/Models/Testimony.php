<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    protected $table = 'testimony';

    protected $fillable = [
        'name', 'description','video_link','avatar','user_created_id', 'user_updated_id','created_at','updated_at','is_published'
    ];

}
