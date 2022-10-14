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

    public function scopeWhereHasReservation($query, $start, $end) {

        $query->where(function($q) use($start, $end) {

            $q->where('starts_at', '>=', $start)
                ->where('starts_at', '<', $end);

        })
        ->orWhere(function($q) use($start, $end) {

            $q->where('ends_at', '>', $start)
                ->where('ends_at', '<=', $end);

        })
        ->orWhere(function($q) use ($start, $end) {

            $q->where('starts_at', '<', $start)
                ->where('ends_at', '>', $end);

        });

    }
}
