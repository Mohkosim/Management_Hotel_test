<?php

namespace Tests\Feature;

use App\Models\Guest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GuestsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_guest(): void
    {
        $response = $this->get('/guests');

        $response->assertStatus(200);
    }

    public function test_view_guest_Create(): void
    {
        $response = $this->get('/guests/create');
        $response->assertStatus(200);
    }

    public function test_guest_Create(): void
    {
        $guest = Guest::create([
            'name' => 'ipang',
            'email' => 'ipang@gmail.com',
            'phone' => '08187263862',
            'date_of_birth' => '1990-01-01',
            'gender' => 'male',
            'address' => 'desa aliyan',
            'postal_code' => '6064',
            'place_of_birth' => 'Banyuwangi'
        ]);

        $response = $this->post(route('guests.store'), $guest->toArray());
        $response->assertRedirect('/guests');
        $response->assertStatus(302);
    }

    // public function test_view_guest_edit(): void
    // {
    //     // Membuat guest baru sebagai sample
    //     $guest = Guest::factory()->create();
    //     $response = $this->get("/guests/{$guest->id}/edit");
    //     $response->assertStatus(200);
    // }


    // public function test_guest_Update(): void
    // {
    //     $guest = Guest::create([
    //         'name' => 'ipang',
    //         'email' => 'ipang@gmail.com',
    //         'phone' => '08187263862',
    //         'date_of_birth' => '1990-01-01',
    //         'gender' => 'male',
    //         'address' => 'desa aliyan',
    //         'postal_code' => '6064',
    //         'place_of_birth' => 'Banyuwangi'
    //     ]);

    //     $response = $this->post(route('guests.store', $guest->id));
    //     $response->assertRedirect(route('/guests'));
    //     $response->assertStatus(302);
    // }

    // public function test_delete_data(): void
    // {
    //     $guest = Guest::create([
    //         'name' => 'ipang',
    //         'email' => 'ipang@gmail.com',
    //         'phone' => '08187263862',
    //         'date_of_birth' => '1990-01-01',
    //         'gender' => 'male',
    //         'address' => 'desa aliyan',
    //         'postal_code' => '6064',
    //         'place_of_birth' => 'Banyuwangi'
    //     ]);
    //     $response = $this->delete(route('guests.destroy', $guest->id));
    //     $response->assertRedirect(route('guests.index'));
    //     $this->assertDatabaseMissing('guests', [
    //         'id' => $guest->id,
    //     ]);
    //     $response->assertStatus(302);
    // }
}
