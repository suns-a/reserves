<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use App\Models\Division;
use App\Models\Usage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    public function index()
    {
        $reserves = DB::table('reservations')
        ->select('user_id', 'division_id', 'usage_id', 'date', 'starts_at', 'ends_at')->get();
        return view('reservation.input',compact('reserves','divisions', 'usages', 'users'));
    }
    
    public function create()
    {
        $users = User::all()->pluck('name', 'id')->toArray();
        $divisions = Division::all()->pluck('name', 'id')->toArray();
        $usages = Usage::all()->pluck('name', 'id')->toArray();
        return view('reservation.input', compact('divisions', 'usages', 'users'));
    }

    public function calendar()
    {
        $reserves = DB::table('reservations')
        ->select('user_id', 'division_id', 'usage_id', 'date', 'starts_at', 'ends_at')->get();
        return view('reservation.display');
    }
}
