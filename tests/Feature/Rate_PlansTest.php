<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Rate_PlansTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_view_Rate_Plans(): void
    {
        $response = $this->get('/sales/rate-plans');

        $response->assertStatus(200);
    }

    public function test_view_create_Rate_Plans(): void
    {
        $response = $this->get('/rate-plans/create');
        $response->assertStatus(200);
    }

    public function test_create_Rate_Plans(): void
    {
        $response = $this->post(route('rate-plans.store'), [
            'unit_group_id' => 1,
            'price' => 100000
        ]);

        $this->assertDatabaseHas('rate_plans', [
            'unit_group_id' => 1
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/sales/rate-plans');
    }

    public function test_update_Rate_Plans(): void
    {
        $response = $this->put(route('rate-plans.update', 1), [
            'unit_group_id' => 1,
            'price' => 200000
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/sales/rate-plans');
    }

    public function test_delete_Rate_Plans(): void
    {
        $response = $this->delete(route('rate-plans.destroy', 1));
        $response->assertStatus(302);
        $response->assertRedirect('/sales/rate-plans');
    }
}
