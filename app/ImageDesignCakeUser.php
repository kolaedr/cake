<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageDesignCakeUser extends Model
{
    protected $table = 'images_for_cakes_designes';

    public function setImgAttribute($value)
    {
        $this->attributes['img'] = ucfirst($value);
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = $value ? \Str::slug($value, '-'): \Str::slug($this->attributes['slug'], '-');
    }
}


