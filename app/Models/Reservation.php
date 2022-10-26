<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'id',
        'user_id',
        'division_id',
        'usage_id',
        'date',
        'starts_at',
        'ends_at'
    ];

    public function division()
    {
        return $this->belongsTo('App\Models\Division');
    }

    public function input($query, $request, $reserve) {

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
