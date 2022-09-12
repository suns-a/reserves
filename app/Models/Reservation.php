<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

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
}
