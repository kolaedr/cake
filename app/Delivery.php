<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
        'street', 'build', 'build_index', 'room', 'comments'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'delivery_for_users', 'delivery_id', 'user_id');
    }

    public function setFavoriteAttribute($value)
    {
        $this->attributes['visible'] = $value ==='on' ? true : false;
    }
}
