<?php

use App\Models\Sity;
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
    $sity = Sity::paginate(25);
    $data = [];
    foreach ($sity as $item) {
        $data[$item->id] = $item->sity;
    }
    return view('welcome', ['sity' => $data]);
});

Route::resource('customer', 'CustomerController');
Route::resource('booking', 'BookingController');
Route::resource('cleaner', 'CleanerController');
Route::resource('sity', 'SityController');