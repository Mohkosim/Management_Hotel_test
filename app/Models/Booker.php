<?php

namespace App\Models;

use App\Models\Guest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booker extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['guest_id', 'name', 'email', 'phone', 'date_of_birth', 'gender', 'address', 'postal_code', 'place_of_birth'];

    public function guest()
{
    return $this->belongsTo(Guest::class);
}

}
