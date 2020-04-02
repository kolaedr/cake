<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderCake extends Model
{
    protected $table = 'order_cakes';
    protected $fillable = [
        'order_id', 'cake_id', 'count',
    ];


    public function orders()
    {
        return $this->belongsToMany('App\Order', 'order_cakes', 'cake_id', 'order_id');
    }

    public function cakes()
    {
        return $this->belongsToMany('App\Cake', 'order_cakes', 'order_id', 'cake_id');
    }
}
