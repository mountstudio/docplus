<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = ['schedule_id', 'user_id', 'name', 'phone_number'];
}
