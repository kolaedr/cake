<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CakeImage extends Model
{
    protected $table = 'cake_images';
    protected $timestamp = false;
    protected $fillable = [
        'image_id', 'cake_id'
    ];
}
