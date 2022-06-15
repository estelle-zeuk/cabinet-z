<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';

    protected $fillable = [
        'question_en', 'question_fr','answer_en','answer_fr','created_at','updated_at','user_created_id','user_updated_id','is_published'
    ];

}
