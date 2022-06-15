<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    protected $table = 'command';

    protected $guarded = [
        'id',
    ];

    public function command(){
        return $this->hasMany(CommandLines::class);
    }
}
