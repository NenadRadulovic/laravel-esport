<?php

namespace Tests\Api;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Venue;
use Database\Factories\VenueFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VenueApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_create_venue(): void
    {
        $venue = VenueFactory::new()->makeOne();
        $response = $this->postJson('/api/venue', $venue->toArray());
        $response->assertStatus(201);
        $this->assertDatabaseHas('venues', $venue->toArray());
    }

    public function test_delete_venue(): void
    {
        $venue = VenueFactory::new()->create();
        $venue->save();

        $response = $this->delete("/api/venue/$venue->id");
        $response->assertOk();
    }

    public function test_update_venue(): void
    {
        $venue = VenueFactory::new()->create();
        $response = $this->put("/api/venue/$venue->id", [
            "capacity" => 10,
            "location" => "Serbia"
        ]);
        $response->assertOk();
        $updatedVenue = Venue::all()->find($venue->id);
        $this->assertEquals($updatedVenue->capacity, $response['data']['capacity']);
        $this->assertEquals($updatedVenue->id, $updatedVenue->id);
        $this->assertEquals($updatedVenue->location, $response['data']['location']);
    }

    public function test_delete_invalid_venue_return_400()
    {
        $response = $this->delete("/api/venue/939393939393939393");
        $response->assertBadRequest();
    }
}
