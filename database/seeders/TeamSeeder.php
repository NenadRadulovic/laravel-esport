<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Factories\TeamFactory;

class TeamSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    TeamFactory::times(5)->create();
  }
}
