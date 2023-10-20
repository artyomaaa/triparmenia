<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['user_id', 'date', 'phone', 'adress', 'language', 'car_model'];

    protected $table = 'services';

    public function service_image()
    {
        return $this->hasMany('App\ServiceImage');
    }
}