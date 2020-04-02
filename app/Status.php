<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $timestamps = false;
    protected $table = 'statuses';

    public function cakes()
    {
        return $this->hasMany('App\Cake', 'status_id');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = $value ? \Str::slug($value, '-'): \Str::slug($this->attributes['slug'], '-');
    }
}
