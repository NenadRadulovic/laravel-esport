<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasTimestamps, HasFactory;

    const TIER_1 = 'tier_1';
    const TIER_2 = 'tier_2';
    const TIER_3 = 'tier_3';

    protected $fillable = [
      'name',
      'tier',
      'prize',
      'venue_id',
      'started',
      'completed',
      'start_time',
      'completed_time',
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'tournament_teams');
    }

    public function venues()
    {
        return $this->belongsTo(Venue::class, 'venue_id', 'id');
    }
}
