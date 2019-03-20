<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['doctor_id', 'content', 'question_id', 'active'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
