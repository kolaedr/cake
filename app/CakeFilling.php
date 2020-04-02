<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CakeFilling extends Model
{
    protected $table = 'cake_fillings';
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
        return $this->hasMany('App\Cake');
    }

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = ucfirst($value);
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = $value ? \Str::slug($value, '-'): \Str::slug($this->attributes['slug'], '-');
    }

    public function setVisibleAttribute($value)
    {
        $this->attributes['visible'] = $value ==='on' ? true : false;
    }
}
