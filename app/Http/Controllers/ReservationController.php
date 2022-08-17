<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function input()
    {
        return view('reservation.input');
    }

    public function display()
    {
        return view('reservation.display');
    }
}
