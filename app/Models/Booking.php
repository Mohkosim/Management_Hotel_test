<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['reservation_id', 'booking_date', 'total_price'];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
