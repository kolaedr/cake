<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DefaultSetting;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = [
        'booking_day',
        'event',
        'cake_count',
        'cheesecake_count',
        'cupcake_count',
        // 'visible',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $defaultSetting = DefaultSetting::all()->last();
            $model->cake_count = $defaultSetting->cake_count;
            $model->cheesecake_count = $defaultSetting->cheesecake_count;
            $model->cupcake_count = $defaultSetting->cupcake_count;
        });
    }
}
