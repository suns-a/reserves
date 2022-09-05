<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use App\Models\Division;
use App\Models\Usage;
use Illuminate\Http\Request;
// use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function create()
    {
        return view('reservation.input');
    }

    public function input(Request $request)
    {
        //division
        // $division = new Division();
        // $division->id = $request->id;
        // $division->name = $request->division;
        // $division->save();
        //name
        $user = new User();
        $user->id = $request->id;
        $user->name = $request->name;
        $user->save();
        //reserve
        $reserve = new Reservation();
        $reserve->users_id = $request->user_id;
        // $reserve->divisions_id = $request->division_id;
        // $reserve->usages_id = $request->usage_id;
        $reserve->date = $request->date;
        $reserve->starts_at = $request->starts_at;
        $reserve->ends_at = $request->ends_at;
        $reserve->save();
        //usage
        // $usage = new Usage();
        // $usage->name = $request->usage;
        // $usage->save();
    }
}
