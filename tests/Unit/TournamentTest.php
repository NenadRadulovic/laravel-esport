<?php

namespace Tests\Unit;

use Database\Factories\TeamFactory;
use Database\Factories\TournamentFactory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TournamentTest extends TestCase
{
  use RefreshDatabase;

  protected function setUp(): void
  {
    parent::setUp();
  }
  /**
   * A basic test example.
   */
  public function test_tournament_created(): void
  {
    TournamentFactory::new()->create();
    $this->assertDatabaseCount('tournaments', 1);
  }

  public function test_assign_teams_to_a_tournament(): void
  {
    $tournament = TournamentFactory::new()->create();
    $teams = TeamFactory::times(5)->create();
    $tournament->teams()->sync($teams->pluck('id'));
    $this->assertNotEmpty($tournament->teams);
    $this->assertDatabaseCount('tournament_teams', 5);
  }
}
