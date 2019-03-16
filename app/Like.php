<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id', 'likeable_id', 'likeable_type'];

    public function likeable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getExistedLike(User $user, $model)
    {
        if ($model) {
            return Like::where('likeable_type', 'App\\'.class_basename($model))
                ->where('likeable_id', $model->id)
                ->where('user_id', $user->id)
                ->get()->first();
        }

        return null;
    }
}
