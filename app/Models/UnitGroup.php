<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\RatePlan;
use App\Models\Inventory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnitGroup extends Model
{
    use HasFactory;
    protected $fillable = ['type'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->whereHas('guest', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        });
    }

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }

    public function inventory(): HasMany
    {
        return $this->HasMany(Inventory::class);
    }

    // public function ratePlan(): BelongsTo
    // {
    //     return $this->belongsTo(RatePlan::class);
    // }
    public function ratePlans(): HasMany
    {
        return $this->hasMany(RatePlan::class); // Jika RatePlan berhubungan dengan UnitGroup
    }

}
