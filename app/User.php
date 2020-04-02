<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone',  'instagram', 'viber', 'telegram', 'facebook', 'provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->role == 'admin' ? true : false;
    }

    // public function orders()
    // {
    //     return $this->belongsToMany('App\Order', 'order_cakes', 'user_id', 'order_id');
    // }

    public function deliveries()
    {
        return $this->belongsToMany('App\Delivery', 'delivery_for_users', 'user_id', 'delivery_id');
    }

    public function cakes()
    {
        return $this->belongsTo('App\Cake', 'cake_filling_tier_1_id', 'id');
    }


    static function checkUser($request)
    {
        if (!\Auth::check()) {
            if (!User::where('phone', '=', $request->phone)->first()) {
                $request->request->add(['password' => bcrypt($request->phone)]);
                $user = User::create($request->all());
                if($request->delivery != 'pickup'){
                    $delivery = Delivery::create($request->all());
                    $request->request->add(['delivery_id' => $delivery->id]);
                    $user->deliveries()->sync($delivery->id);
                }
                auth()->attempt(array('phone' => $request->phone, 'password' => $request->phone));
                return $user->id;
            }else{
                return User::where('phone', '=', $request->phone)->first()->id;
            };
        }else{
            return \Auth::user()->id;
        };
    }
}
