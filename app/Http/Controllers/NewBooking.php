<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

class NewBooking extends Controller
{
    public function Create(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
//            'date' => 'required|date|after:yesterday',
//            'time' => 'required',
//            'chours' => 'required|integer',
        ]);
        $data = $request->all();
        $customer = Customer::where('phone_number', $data['phone_number'])->first();
        if (is_null($customer)) {
            $customer = Customer::create($data);
        }
        //Find cleaner
        //add booking
    }
}
