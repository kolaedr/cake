<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageDesignCakeUser extends Model
{
    protected $table = 'images_for_cakes_designes';

    public function cakes()
    {
        return $this->belongsToMany('App\Cake', 'images_for_cakes_designes', 'id', 'cake_id');
    }

    public function images()
    {
        return $this->belongsToMany('App\Image', 'images_for_cakes_designes', 'id', 'images_id');
    }


    public function setImgAttribute($value)
    {
        $this->attributes['img'] = ucfirst($value);
    }


}


