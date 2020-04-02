<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    protected $fillable = ['order_id', 'product_id', 'price', 'qty'];

    public function orders()
    {
        return $this->belongsToMany('App\Order', 'order_lists', 'product_id', 'order_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'order_lists', 'order_id', 'product_id');
    }
}
