<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CakeSize extends Model
{
    protected $table = 'cake_sizes';
    protected $fillable = [
        'tier',
        'weight_min',
        'weight_max',
        'piece_min',
        'piece_max',
        'price',
        'visible',
    ];

    public function cakes()
    {
        return $this->hasMany('App\Cake');
    }

    public function setVisibleAttribute($value)
    {
        $this->attributes['visible'] = $value ==='on' ? true : false;
    }
}
