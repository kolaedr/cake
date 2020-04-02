<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CakeUser extends Model
{
    protected $table = 'cake_for_users';

    public function setVisibleAttribute($value)
    {
        $this->attributes['visible'] = $value ==='on' ? true : false;
    }
}
