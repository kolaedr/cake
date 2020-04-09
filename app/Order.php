<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'status_id', 'delivery', 'comments', 'booking', 'count', 'total_amount', 'admin_comment'
    ];
    // protected $hidden = ['admin_comment'];
    // public function users()
    // {
    //     return $this->hasOne('App\User', 'id', 'user_id');
    // }

    public function cakes()
    {
        return $this->hasMany('App\Cake');
    }




    public function users()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    // public function cakes()
    // {
    //     return $this->belongsToMany('App\Cake', 'order_cakes', 'order_id', 'cake_id');
    // }

    public function statuses()
    {
        return $this->hasOne('App\Status', 'id', 'status_id');
    }

    public function deliveries()
    {
        return $this->hasOne('App\Delivery', 'id', 'delivery_id');
    }

    // public function setBookingAttribute($value)
    // {
    //     $this->attributes['booking'] = \Carbon\Carbon::parse($value)->timestamp;
    // }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'order_lists', 'order_id', 'product_id')->withPivot('qty', 'price');
    }

    public function setVisibleAttribute($value)
    {
        $this->attributes['visible'] = $value ==='on' ? true : false;
    }
}
