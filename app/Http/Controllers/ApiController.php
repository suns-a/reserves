<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Division;
use App\Models\Usage;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\DB;
use App\Services\ReservationService;

class ApiController extends Controller
{
    public function input(ReservationRequest $request)
    {
        $checkExist = ReservationService::checkReserveDuplication(
            $request['date'],
            $request['starts_at'],
            $request['ends_at']
        );

        if ($checkExist) {
            return redirect()->back()
                        ->with(['error' => '予約済みの日時です。'])
                        ->withInput();
        }

        //reserve
        else {
            $reserve = new Reservation();
            $reserve['user_id'] = $request->name;
            $reserve['division_id'] = $request->division;
            $reserve['usage_id'] = $request->usage;
            $reserve['date'] = $request->date;
            $reserve['starts_at'] = $request->starts_at;
            $reserve['ends_at'] = $request->ends_at;
            $reserve->save();
            return response()->json($reserve);
            // return json_encode($reserve);
        }
        
    }

    public function calendar()
    {
        $reserves = DB::table('reservations');
        $users = User::all()->pluck('name', 'id')->toArray();
        $divisions = Division::all()->pluck('name', 'id')->toArray();
        $usages = Usage::all()->pluck('name', 'id')->toArray();
        return view('reservation.input',compact('reserves','divisions', 'usages', 'users'));
    }
}
