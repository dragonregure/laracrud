<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = "answers";

    protected $fillable = [
        'question_id',
        'user_id',
        'content',
        'is_selected'
    ];
}
