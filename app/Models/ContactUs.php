<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contact_us';

    protected $fillable = [
        'project_id', 'name', 'surname','subject', 'email', 'message','read','created_at','updated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }

}
