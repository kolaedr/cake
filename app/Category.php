<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];
    public $timestamps = false;
    protected $table = 'categories';

    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_categories', 'category_id', 'product_id');
    }


    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = $value ? \Str::slug($value, '-'): \Str::slug($this->attributes['slug'], '-');
    }
}
