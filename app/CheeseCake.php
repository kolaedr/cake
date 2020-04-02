<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheeseCake extends Model
{
    // protected $table = 'order_cheeseakes';

    public function setVisibleAttribute($value)
    {
        $this->attributes['visible'] = $value ==='on' ? true : false;
    }

}
