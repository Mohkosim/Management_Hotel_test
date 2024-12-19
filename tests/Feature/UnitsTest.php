<?php

namespace Tests\Feature;

use App\Models\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UnitsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_unit(): void
    {
        $response = $this->get('/room/units');

        $response->assertStatus(200);
    }

    public function test_view_unit_Create(): void
    {
        $response = $this->get('/room/units/create');
        $response->assertStatus(200);
    }

    public function test_unit_Create(): void
    {
        $unit = Unit::create([
            'name' => 'Standart Room',
            'description' => 'Standart Room',
            'max_person' => '2',
        ]);

        $response = $this->post(route('units.store'), $unit->toArray());
        $response->assertRedirect(route('rooms.units.index'));
        // $response->assertStatus(302);
    }
}
