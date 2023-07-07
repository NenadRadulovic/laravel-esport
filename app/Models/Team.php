<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
  use HasTimestamps, HasFactory;

  protected $fillable = [
    'id',
    'name',
  ];

  public function teamMembers(): HasMany
  {
    return $this->hasMany(Employee::class);
  }

  public function tournaments()
  {
    return $this->belongsToMany(Tournament::class, 'tournament_teams');
  }
}
