<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
      * Get the validation rules that apply to the request.
      *
      * @return array<string, mixed>
      */
    public function rules()
    {
        return [
            'division' => 'required',
            'name' => 'required',
            'date' => 'required|date',
            'starts_at' => 'required|date_format:H:i|before:ends_at|unique:reservations,starts_at,NULL,starts_at,date,' . $this->input('date'),
            'ends_at' => 'required|date_format:H:i|after:starts_at|unique:reservations,ends_at,NULL,date,date,' . $this->input('date'),
            'usage' => 'required'
        ];
    }
}
