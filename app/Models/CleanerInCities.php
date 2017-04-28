<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CleanerInCities extends Model
{
    protected $table = 'cleaner_in_cities';
    protected $fillable = [
        'cleaner_id',
        'city_id',
    ];
}
