<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoreAdditionalFillersCake extends Model
{
    protected $table = 'more_additional_fillers_cakes';

    public function cakes()
    {
        return $this->belongsToMany('App\Cake', 'more_additional_fillers_cakes', 'additional_filler_id', 'cake_id');
    }

    public function AdditionalFiller()
    {
        return $this->belongsToMany('App\AdditionalFiller', 'more_additional_fillers_cakes', 'cake_id', 'additional_filler_id');
    }

}
