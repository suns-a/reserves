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
    public function checkSchedule($query, $start, $end) {

        $query->where(function($q) use($start, $end) { // 解説 - 1

            $q->where('starts_at', '>=', $start)
                ->where('starts_at', '<', $end);

        })
        ->orWhere(function($q) use($start, $end) { // 解説 - 2

            $q->where('ends_at', '>', $start)
                ->where('ends_at', '<=', $end);

        })
        ->orWhere(function($q) use ($start, $end) { // 解説 - 3

            $q->where('starts_at', '<', $start)
                ->where('ends_at', '>', $end);

        });

    }
}
