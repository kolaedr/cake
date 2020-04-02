<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Сupcake extends Model
{

    public function setFavoriteAttribute($value)
    {
        $this->attributes['visible'] = $value ==='on' ? true : false;
    }
}
