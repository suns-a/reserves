<?php

namespace App\Repositories\Reserve;

use App\Models\Reservation;
use App\Models\Division;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ReserveRepository implements ReserveRepositoryInterface
{
    public function getReservations()
    {
        return Reservation::all();
    }

    public function inputDivision(Request $request)
    {
        $division = new Division();
        $division->name = $request->name;
        $division->save();
    }

    public function inputName(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->save();
    }

    public function inputDate()
    {
    }

    public function inputStart()
    {
    }

    public function inputEnd()
    {
    }

    public function inputContent()
    {
    }
}
