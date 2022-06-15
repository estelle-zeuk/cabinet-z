<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommandLines extends Model
{
    protected $table = 'command_lines';

    protected $guarded = [
        'id',
    ];

    public function command(){
        return $this->belongsTo(Command::class,'command_id');
    }

}
