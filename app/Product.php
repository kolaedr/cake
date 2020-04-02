<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'product_categories', 'product_id', 'category_id');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order', 'order_lists', 'product_id', 'order_id');
    }

    public function setFavoriteAttribute($value)
    {
        $this->attributes['visible'] = $value ==='on' ? true : false;
    }
}
