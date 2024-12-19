<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\RatePlan;
use App\Models\UnitGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['unit', 'unitGroup', 'ratePlan'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->whereHas('unit', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })->orWhereHas('unitGroup', function ($query) use ($search) {
                $query->where('type', 'like', '%' . $search . '%');
            });
        });
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function unitGroup(): BelongsTo
    {
        return $this->belongsTo(UnitGroup::class);
    }

    public function ratePlan(): BelongsTo
    {
        return $this->belongsTo(RatePlan::class);
    }
}
