<?php

namespace App\Repositories\Reserve;

use App\Repositories\Reserve\ReserveRepositoryInterface;
use App\Models\Reservation;
use App\Models\Division;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ReserveRepository implements ReserveRepositoryInterface
{
    // public function checkSchedule($date, $num)
    // {
    //     if(Reservation::where(['date' => $date])->count() != 0)
    //     {
    //         return false;
    //     }
    //     for($i = 1; $i < $num; $i++)
    //     {
    //         if(Reservation::where(['date' => date('Y-m-d', strtotime($date.'+'.$i.' date'))])->count() != 0)
    //         {
    //             return false;
    //         }
    //     }

    //     return true;
    // }

    // Scope
    public function checkSchedule($query, $request, $reserve) {

        $checkExist = DB::table('reservations')
        ->where('date', $request->date)
        ->where(function ($query) use ($request, $reserve) {
            $query->where(function ($subQuery) use ($request, $reserve) {
                $subQuery->where($request->starts_at, '<', $reserve->starts_at)
                         ->where($request->ends_at, '>', $reserve->ends_at);
            })->orWhere(function ($subQuery) use ($request, $reserve) {
                $subQuery->where($request->ends_at, '<', $reserve->ends_at)
                         ->where($request->ends_at, '>', $reserve->starts_at);
            })->orWhere(function ($subQuery) use ($request, $reserve) {
                $subQuery->where($request->starts_at, '<', $reserve->ends_at)
                         ->where($request->ends_at, '>', $reserve->ends_at);
            });
        });

    }
}
