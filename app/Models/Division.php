<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $table = "divisions";

    protected $fillable = [
        'id',
        'name'
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'division_id', 'division_id');
    }
}
