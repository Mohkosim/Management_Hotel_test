<?php

namespace Database\Seeders;

use App\Models\UnitGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UnitGroup::create([
            'type' => 'Standard Room'
        ]);

        UnitGroup::create([
            'type' => 'VIP Room'
        ]);

        UnitGroup::create([
            'type' => 'Meeting Room'
        ]);

        UnitGroup::create([
            'type' => 'Restaurant'
        ]);
    }
}
