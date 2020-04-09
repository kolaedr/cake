<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DefaultSetting extends Model
{
    protected $table = 'default_settings';
    protected $fillable = ['cake_count', 'cheesecake_count', 'cupcake_count'];
}
