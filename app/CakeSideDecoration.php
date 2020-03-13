<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CakeSideDecoration extends Model
{
    protected $table = 'cake_side_decorations';
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
}
