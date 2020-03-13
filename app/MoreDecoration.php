<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoreDecoration extends Model
{
    protected $table = 'more_decor_for_cakes';
    protected $fillable = [
        'additional_decoration_id',
        'cake_id',
    ];

    public function cakes()
    {
        return $this->belongsToMany('App\Cake', 'more_decor_for_cakes', 'additional_decorations_id', 'cake_id');
    }

    public function AdditionalDecorations()
    {
        return $this->belongsToMany('App\AdditionalDecoration', 'more_decor_for_cakes', 'cake_id', 'additional_decorations_id');
    }

    
}
