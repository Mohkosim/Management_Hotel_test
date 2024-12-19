<?php

namespace Database\Seeders;

use Exception;
use App\Models\Unit;
use App\Models\User;
use App\Models\Guest;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Inventory;
use App\Models\UnitGroup;
use Illuminate\Database\Seeder;
use Database\Seeders\GuestSeeder;
use Database\Seeders\UnitSeeder;
use Database\Seeders\UnitGroupSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        $this->call([GuestSeeder::class, UnitGroupSeeder::class, UnitSeeder::class]);

        // Mendapatkan unit group dengan type 'Standard Room'
        $unitGroup = UnitGroup::where('type', 'Standard Room')->firstOrFail();

        // Mendapatkan semua unit
        $units = Unit::all();

        // Loop melalui setiap unit dan buat inventaris untuk masing-masing unit
        foreach ($units as $unit) {
            Inventory::factory()->create([
                'unit_id' => $unit->id,
                'unit_group_id' => $unitGroup->id,
            ]);
        }
    }
}
