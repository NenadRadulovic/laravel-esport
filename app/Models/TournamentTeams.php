<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TournamentTeams extends Pivot
{
    use HasTimestamps, HasFactory;

    protected $table = 'tournament_teams';

    protected $fillable = [
      'team_id',
      'tournament_id',
    ];
}
