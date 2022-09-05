<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = "reservations";

    protected $fillable = [
        'id',
        'user_id',
        'division_id',
        'usage_id'
    ];

    public function division()
    {
        // return $this->hasMany(Division::class, 'division_id', 'division_id');
        // dd($maxId);
        // $maxId = DB::table("INFORMATION_SCHEMA.TABLES")
        //     ->select("AUTO_INCREMENT")
        //     ->where("TABLE_SCHEMA", "reserve")
        //     ->where("TABLE_NAME", "reservations")
        //     ->first()->AUTO_INCREMENT;
        // return $maxId;
    }

    // Scope
    // public function scopeWhereHasReservation($query, $start, $end)
    // {
    //     $query->where(function ($q) use ($start, $end) {
    //         $q->where('date_at', 'start_time', '>=', $start)
    //             ->where('date_at', 'start_time', '<', $end);
    //     })
    //     ->orWhere(function ($q) use ($start, $end) {
    //         $q->where('date_at', 'end_time', '>', $start)
    //             ->where('date_at', 'end_time', '<=', $end);
    //     })
    //     ->orWhere(function ($q) use ($start, $end) {
    //         $q->where('date_at', 'start_time', '<', $start)
    //             ->where('date_at', 'end_time', '>', $end);
    //     });
    // }
}
