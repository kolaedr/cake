<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CakeSize extends Model
{
    protected $table = 'cake_sizes';
    protected $fillable = [
        'lavel',
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
}
