<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiries extends Model
{
    protected $table = 'enquiries';

    protected $fillable = [
        'name', 'email', 'phone', 'subject', 'message', 'created_at', 'updated_at', 'read'
    ];

}
