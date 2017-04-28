<?php

use App\Models\City;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    $city = City::paginate(25);
    $data = [];
    foreach ($city as $item) {
        $data[$item->id] = $item->city;
    }
    return view('welcome', ['city' => $data]);
});

Route::resource('customer', 'CustomerController');
Route::resource('booking', 'BookingController');
Route::resource('cleaner', 'CleanerController');
Route::resource('city', 'CityController');
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('/new_booking', 'NewBooking@Create');

