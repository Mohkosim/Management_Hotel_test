<?php

namespace App\Models;

use App\Models\Guest;
use App\Models\Booker;
use App\Models\Inventory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Reservation extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['guest', 'inventory'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->whereHas('guest', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        });
    }

    public static function generateRandomId($reservationId)
    {
        // Generate a random string of 8 characters
        $randomString = Str::random(8);
        return strtoupper($randomString) . '-' . $reservationId;
    }

    public function booker(): BelongsTo
    {
        return $this->belongsTo(Booker::class);
    }

    public function guest(): BelongsTo
    {
        return $this->belongsTo(Guest::class);
    }

    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class);
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

}
