<?php

namespace App\Models;

use App\Models\Booker;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = ['booker_id','name', 'email', 'phone', 'date_of_birth', 'gender', 'address', 'postal_code', 'place_of_birth'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%');
            });
        });
    }

    public function booker(): BelongsTo
    {
        return $this->belongsTo(Booker::class);
    }

    public function reservation() {
        return $this->hasMany(Reservation::class);
    }
}
