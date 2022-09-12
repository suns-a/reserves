<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use App\Models\Division;
use App\Models\Usage;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\DB;

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
        //reserve
        $reserve = new Reservation;
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
