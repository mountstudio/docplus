<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Question extends Model
{
    protected $fillable = ['user_id', 'content', 'images', 'category_id', 'active', 'name', 'age', 'email', 'sex', 'title'];

    protected $casts = [
        'images' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function updateQuestionViews(Question $question = null)
    {
        if ($question) {
            if (!Session::has('questionViews')) {
                Session::put('questionViews', []);
            } else {
                $questionViews = Session::get('questionViews');

                if (!in_array($question->id, $questionViews)) {
                    $question->update(['views' => $question->views++]);
                    $questionViews[] = $question->id;
                    Session::put('questionViews', $questionViews);
                }
            }
        }
    }
}
