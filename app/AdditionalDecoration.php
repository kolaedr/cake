<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalDecoration extends Model
{
    protected $table = 'additional_decorations';
    protected $fillable = [
        'name',
        'slug',
        'price',
        'image',
        'describe',
        'visible',
    ];

    // public function cakes()
    // {
    //     return $this->hasMany('App\Cake');
    // }

    public function cakes()
    {
        return $this->belongsToMany('App\Cake', 'more_decor_for_cakes', 'additional_decorations_id', 'cake_id');
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
