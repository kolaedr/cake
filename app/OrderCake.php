<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderCake extends Model
{
    protected $table = 'order_cakes';
    protected $fillable = [
        'user_id', 'cake_id', 'count',
    ];


    public function users()
    {
        return $this->belongsToMany('App\User', 'order_cakes', 'cake_id', 'user_id');
    }

    public function cakes()
    {
        return $this->belongsToMany('App\Cake', 'order_cakes', 'user_id', 'cake_id');
    }
}
