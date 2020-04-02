<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryUser extends Model
{
    protected $table = 'delivery_for_users';
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'delivery_for_users', 'delivery_id', 'user_id');
    }

    public function deliveries()
    {
        return $this->belongsToMany('App\Delivery', 'delivery_for_users', 'user_id', 'delivery_id');
    }

    public function setFavoriteAttribute($value)
    {
        $this->attributes['visible'] = $value ==='on' ? true : false;
    }
}
