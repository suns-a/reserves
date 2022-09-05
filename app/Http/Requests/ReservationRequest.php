<?php

namespace App\Http\Requests;

use App\Rules\ReservationRule;
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

    public function all($keys = null)
    {
        $results = parent::all($keys);
        $results['date_at'] = $results['date'];
        $results['start_time'] = $results['starts_at'];
        $results['end_time'] = $results['ends_at'];
        return $results;
    }

    /**
      * Get the validation rules that apply to the request.
      *
      * @return array<string, mixed>
      */
    public function rules()
    {
        return [
            'resrvation_id' => 'resrvation_id',
            'date' => 'required|date',
            'starts_at' => 'required|date_format:H:i',
            'ends_at' => 'required|date_format:H:i',
            'start_at' => [
                new ReservationRule(
                    $this->date_at,
                    $this->start_time,
                    $this->end_time
                )
            ]
        ];
    }
}
