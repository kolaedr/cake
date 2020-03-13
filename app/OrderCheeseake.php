<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderCheeseake extends Model
{
    protected $table = 'order_cheesecakes';
    protected $fillable = [
        'user_id', 'cheese_id', 'count',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'order_cheesecakes', 'cheese_id', 'user_id');
    }

    public function cheesecakes()
    {
        return $this->belongsToMany('App\CheeseCake', 'order_cheesecakes', 'user_id', 'cheese_id');
    }
}
