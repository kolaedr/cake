<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CakeTopDecoration extends Model
{
    protected $table = 'cake_top_decorations';
    protected $fillable = [
        'name',
        'slug',
        'price',
        'image',
        'describe',
        'visible',
    ];

    public function cakes()
    {
        return $this->hasMany('App\Cake', 'cake_top_decoration_id');
    }


    public function setImageAttribute($value)
    {
        $this->attributes['image'] = ucfirst($value);
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = $value ? \Str::slug($value, '-'): \Str::slug($this->attributes['slug'], '-');
    }
}
