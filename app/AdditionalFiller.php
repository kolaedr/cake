<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalFiller extends Model
{
    protected $table = 'additional_fillers';
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
        return $this->belongsToMany('App\Cake', 'more_additional_fillers_cakes', 'additional_filler_id', 'cake_id');
    }

    public function setImgAttribute($value)
    {
        $this->attributes['image'] = ucfirst($value);
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = $value ? \Str::slug($value, '-'): \Str::slug($this->attributes['slug'], '-');
    }
}
