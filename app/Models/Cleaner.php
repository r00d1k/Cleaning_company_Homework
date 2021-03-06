<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cleaner extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cleaners';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'quality_score'];

    public function cities()
    {
        return $this->belongsToMany('App\Models\City', 'cleaner_in_cities', 'cleaner_id', 'city_id');
    }
    public function bookings() {
        return $this->hasMany('App\Models\Booking');
    }
}
