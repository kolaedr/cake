<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    public $timestamps = false;
    protected $table = 'product_categories';

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'product_categories', 'product_id', 'category_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_categories', 'category_id', 'product_id');
    }
}
