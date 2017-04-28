<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['city'];

    public function cleaners()
    {
        return $this->belongsToMany('App\Models\Cleaner', 'cleaner_in_cities', 'city_id', 'cleaner_id');
    }
}
