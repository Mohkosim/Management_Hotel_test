<?php

namespace Database\Seeders;

use App\Models\Guest;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guest::create([
            'name' => 'Dafa Ifaldi',
            'email' => 'dafaifaldi25@gmail.com',
            'phone' => '081234434243',
            'date_of_birth' => '03-06-25',
            'gender' => 'male',
            'address' => 'Banyuwangi',
            'postal_code' => '68417',
            'place_of_birth' => 'Jakarta'
        ]);

        Guest::factory(24)->create();
    }
}
