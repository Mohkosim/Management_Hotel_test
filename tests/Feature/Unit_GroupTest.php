<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\UnitGroup;
use App\Models\User;

class Unit_GroupTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    // public function test_masuk_tanpa_login(): void
    // {
    //     $response = $this->get('/room/unit-groups');
    //     $response->assertRedirect('/login');
    //     $response->assertStatus(302);
    // }

    public function test_unit_groups(): void
    {
        $response = $this->get('/room/unit-groups');

        $response->assertStatus(200);
        $response->assertSee('Unit Groups');
    }

    public function test_view_create_unit_groups(): void
    {
        $response = $this->get('/room/unit-groups/create');
        $response->assertStatus(200);
        $response->assertSee('Add a new unit group');
    }


    public function test_create_unit_groups(): void
    {
        $response = $this->post(route('unit-groups.store'), [
            'type' => "Single",
        ]);
        $this->assertDatabaseHas('unit_groups', [
            'type' => "Single"
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/room/unit-groups');
    }

    public function test_update_unit_groups(): void
    {
        $unitGroup = UnitGroup::factory()->create();
        $response = $this->put(route('unit-groups.update', $unitGroup->id), [
            'type' => "VIP Room",
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/room/unit-groups');
    }

    public function test_delete_unit_groups(): void
    {
        $unitGroup = UnitGroup::factory()->create();
        $response = $this->delete(route('unit-groups.destroy', $unitGroup->id));
        $response->assertStatus(302);
        $response->assertRedirect('/room/unit-groups');
    }

}
