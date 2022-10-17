<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use App\Models\Division;
use App\Models\Usage;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    public function create()
    {
        $users = User::all()->pluck('name', 'id')->toArray();
        $divisions = Division::all()->pluck('name', 'id')->toArray();
        $usages = Usage::all()->pluck('name', 'id')->toArray();
        return view('reservation.input', compact('divisions', 'usages', 'users'));
    }

    public function input(ReservationRequest $request)
    {
        $reserve = new Reservation();

        if (DB::table('reservations')
        ->where('date', $request->date)
        ->where('starts_at', $request->starts_at)
        ->where('ends_at', $request->ends_at)
        ->exists()
        && [$request->starts_at >= $reserve->starts_at]
        && [$reserve->starts_at < $request->ends_at]
        && [$request->ends_at <= $reserve->ends_at]
        ) 
          {
            return redirect()->back()
                        ->with(['error' => '予約済みの日時です。'])
                        ->withInput(); 
          }

        //reserve
        else {
            $reserve->user_id = $request->name;
            $reserve->division_id = $request->division;
            $reserve->usage_id = $request->usage;
            $reserve->date = $request->date;
            $reserve->starts_at = $request->starts_at;
            $reserve->ends_at = $request->ends_at;
            $reserve->save();
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        $request->reservation_id;
        $request->delete();
    }
}
