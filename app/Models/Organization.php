<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasUuids, HasFactory, HasTimestamps;

    protected $fillable = [
      "name",
      'description',
      'logo',
      'founded_date',
    ];

    protected $casts = [
      'founded_date' => 'datetime',
    ];
}
