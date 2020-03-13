<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'status_id', 'delivery_id', 'comments',
    ];

    // public function users()
    // {
    //     return $this->hasOne('App\User', 'id', 'user_id');
    // }

    // public function cakes()
    // {
    //     return $this->hasOne('App\OrderCake', 'user_id', 'cake_id');
    // }

    public function users()
    {
        return $this->belongsToMany('App\User', 'order_cakes', 'cake_id', 'user_id');
    }

    public function statuses()
    {
        return $this->hasOne('App\Status', 'id', 'status_id');
    }

    public function deliveries()
    {
        return $this->hasOne('App\Delivery', 'id', 'delivery_id');
    }
}
