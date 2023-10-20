<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'first_name', 'last_name', 'email', 'subject', 'message','picture'];

    public function user()
    {
        return $this->belongsTo('App\User');

    }

    public function post()
    {
        return $this->belongsTo('App\Post');

    }
}
