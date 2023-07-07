<?php

namespace Tests\Unit;

use Database\Factories\TournamentFactory;
use Database\Factories\VenueFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VenueTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * A basic test example.
     */
    public function test_add_tournament_to_venue(): void
    {
        $tournaments = TournamentFactory::times(5)->create();
        $venue = VenueFactory::new()->create();
        $this->assertDatabaseCount('tournaments', 5);
        $this->assertDatabaseCount('venues', 1);
        $venue->tournaments()->saveMany($tournaments);
        $this->assertCount(5, $venue->tournaments);
    }
}
