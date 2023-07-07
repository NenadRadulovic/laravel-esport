<?php

namespace Tests\Unit;

use App\Models\Role;
use Database\Factories\EmployeeFactory;
use Database\Factories\TeamFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeamTest extends TestCase
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
        TeamFactory::new()->create();
        $this->assertDatabaseCount('teams', 1);
    }

    public function test_assign_team_members_to_a_team(): void
    {
        $team = TeamFactory::new()->create();
        EmployeeFactory::times(5)->withRole(Role::PLAYER)->create([
          'team_id' => $team->id,
        ]);
        EmployeeFactory::times(3)->withRole(Role::Coach)->create([
          'team_id' => $team->id,
        ]);
        EmployeeFactory::times(2)->withRole(Role::Manager)->create([
          'team_id' => $team->id,
        ]);

        $this->assertCount(10, $team->teamMembers);
    }
}
