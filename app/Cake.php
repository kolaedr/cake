<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    protected $fillable = [
        'text_decoration',
        'cake_filling_tier_1_id',
        'cake_filling_tier_2_id',
        'cake_filling_tier_3_id',
        'cake_top_decoration_id',
        'cake_side_decoration_id',
        'cake_size_id',
        // 'additional_filler_id',
        // 'additional_decorations_id',
        'comments',
        'order_id',

    ];

    public function CakeSideDecorations()
    {
        return $this->hasOne('App\CakeSideDecoration', 'id', 'cake_side_decoration_id');
    }

    public function CakeSizes()
    {
        return $this->hasOne('App\CakeSize', 'id', 'cake_size_id');
    }

    public function CakeTopDecorations()
    {
        return $this->hasOne('App\CakeTopDecoration', 'id', 'cake_top_decoration_id');
    }

    public function tierOne()
    {
        return $this->hasOne('App\CakeFilling', 'id', 'cake_filling_tier_1_id');
    }

    public function tierTwo()
    {
        return $this->hasOne('App\CakeFilling', 'id', 'cake_filling_tier_2_id');
    }

    public function tierThree()
    {
        return $this->hasOne('App\CakeFilling', 'id', 'cake_filling_tier_3_id');
    }

    public function AdditionalDecorations()
    {
        return $this->belongsToMany('App\AdditionalDecoration', 'more_decor_for_cakes', 'cake_id', 'additional_decorations_id');
    }

    public function AdditionalFillers()
    {
        return $this->belongsToMany('App\AdditionalFiller', 'more_additional_fillers_cakes', 'cake_id', 'additional_filler_id');
    }

    // public function users()
    // {
    //     return $this->belongsToMany('App\User', 'order_cakes', 'cake_id', 'user_id');
    // }

    public function orders()
    {
        return $this->hasOne('App\Order', 'id', 'order_id');
    }


    public function images()
    {
        return $this->belongsToMany('App\Image', 'images_for_cakes_designes', 'cake_id', 'image_id');
    }

    public function setFavoriteAttribute($value)
    {
        $this->attributes['visible'] = $value ==='on' ? true : false;
    }

    static function totalAmount()
    {
        $cake = new Cake();

        return $cake;

    }

}
