<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = false;
    protected $table = 'images';
    protected $fillable = ['url', 'alt'];

    public function cakes()
    {
        return $this->belongsToMany('App\Cake', 'images_for_cakes_designes', 'image_id', 'cake_id');
    }


}
