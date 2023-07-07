<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venue extends Model
{
    use HasTimestamps, HasFactory;

    protected $fillable = [
      'name',
      'capacity',
      'location',
    ];

    public function tournaments(): HasMany
    {
        return $this->hasMany(Tournament::class);
    }
}
