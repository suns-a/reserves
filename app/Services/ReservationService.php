<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ReservationService
{
    public static function checkReserveDuplication($date, $startsAt, $endsAt)
    {
        return DB::table('reservations')
        ->whereDate('date', $date)
        ->whereTime('ends_at', '>', $startsAt)
        ->whereTime('starts_at', '<', $endsAt)
        ->exists();
    }
}
