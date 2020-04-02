<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CakePop extends Model
{
    public function setVisibleAttribute($value)
    {
        $this->attributes['visible'] = $value ==='on' ? true : false;
    }
}
