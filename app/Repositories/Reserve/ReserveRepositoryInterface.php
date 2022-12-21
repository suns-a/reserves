<?php

namespace App\Repositories\Reserve;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Collection;

interface ReserveRepositoryInterface
{
    public function checkSchedule($query, $start, $end);
}
