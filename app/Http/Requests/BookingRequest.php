<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !Auth::guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required|date|after:yesterday',
            'time' => 'required',
            'chours' => 'required|integer',
            'customer_id' => 'required|exists:customers,id',
            'cleaner_id' => 'required|exists:cleaners,id',
        ];
    }
}
