<?php

namespace App\Models;

use App\Models\Guest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Booker extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['name', 'email', 'phone', 'date_of_birth', 'gender', 'address', 'postal_code', 'place_of_birth','random_id'];

    public function guest()
    {
        return $this->hasMany(Guest::class);
    }

    public static function generateRandomId($bookerId)
    {
        $randomString = Str::random(8);
        return strtoupper($randomString) . '-' . $bookerId;
    }
}
