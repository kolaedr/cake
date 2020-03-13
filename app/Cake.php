<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    protected $fillable = [
        'text_decoration',
        'cake_filling_lavel_1_id',
        'cake_filling_lavel_2_id',
        'cake_filling_lavel_3_id',
        'cake_top_decoration_id',
        'cake_side_decoration_id',
        'cake_size_id',
        'more_ingridient_id',
        'more_decoration_id',
        'comment',
        'booking_time'
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

    public function lavelOne()
    {
        return $this->hasOne('App\CakeFilling', 'id', 'cake_filling_lavel_1_id');
    }

    public function lavelTwo()
    {
        return $this->hasOne('App\CakeFilling', 'id', 'cake_filling_lavel_2_id');
    }

    public function lavelThree()
    {
        return $this->hasOne('App\CakeFilling', 'id', 'cake_filling_lavel_3_id');
    }

    public function AdditionalDecorations()
    {
        return $this->belongsToMany('App\AdditionalDecoration', 'more_decor_for_cakes', 'cake_id', 'additional_decorations_id');
    }
    
    public function AdditionalFillers()
    {
        return $this->belongsToMany('App\AdditionalFiller', 'more_additional_fillers_cakes', 'cake_id', 'additional_filler_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'order_cakes', 'cake_id', 'user_id');
    }

}
