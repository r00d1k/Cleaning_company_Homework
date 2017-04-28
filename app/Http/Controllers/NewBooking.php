<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\City;
use App\Models\Booking;

class NewBooking extends Controller
{
    public function Create(Request $request)
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
        if (is_null($customer)) {
            $customer = Customer::create($data);
        }
        $city = City::find($data['city']);
        if (!empty($city->cleaners->toArray())) {
            foreach ($city->cleaners as $cleaner) {
                if (empty($cleaner->bookings->toArray())) {
                    $this->booking($data, $customer, $cleaner);
                    return 'Success';
                }
                if (empty($cleaner->bookings()
                    ->where('date', $data['date'])
                    ->get()->toArray()))
                {
                    var_dump($data['date'], $cleaner->bookings()
                        ->where('date', $data['date'])
                        ->get()->toArray());
                    $this->booking($data, $customer, $cleaner);
                    return 'Success';
                }
            }
        }
        return 'Fail: we could not fulfill your request';
        //add booking
    }

    protected function booking($data, $customer, $cleaner) {
        Booking::create([
            'date' => $data['date'],
            'time' => $data['time'],
            'chours' => $data['chours'],
            'customer_id' => $customer->id,
            'cleaner_id' => $cleaner->id,
        ]);
    }
}
