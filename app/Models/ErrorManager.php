<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ErrorManager extends Model
{
    protected $table = 'error_manager';

    protected $fillable = [
        'id','message','action','code','feature','created_at','updated_at'
    ];
}
