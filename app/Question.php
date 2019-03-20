<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
