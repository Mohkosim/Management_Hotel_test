<?php

namespace App\Models;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseKeeping extends Model
{
    use HasFactory;

    protected $table = 'housekeepings';

    protected $fillable = [
        'unit_id',
        'current_condition',
        'current_status',
    ];


    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class);
    }
}
