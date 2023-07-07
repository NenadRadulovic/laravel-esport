<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  use HasTimestamps, HasFactory;

  protected $table = 'roles';

  const PLAYER = 'Player';
  const Coach = 'Coach';
  const Manager = 'Manager';

  const ROLES = [
    self::PLAYER,
    self::Coach,
    self::Manager
  ];

  protected $fillable = [
    'id',
    'name'
  ];
}
