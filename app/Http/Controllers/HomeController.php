<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function newBooking(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'date' => 'required|date|after:yesterday',
            'time' => 'required',
            'chours' => 'required|integer',
        ]);
        $data = $request->all();
        $customer = Customer::where('phone_number', $data['phone_number'])->first();
        var_dump($customer);
        if (is_null($customer)) {
            $customer = Customer::create($data);
        }
        echo 111;
        //Auth
        //Find cleaner
        //add booking
    }
}
