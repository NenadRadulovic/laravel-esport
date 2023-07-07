<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\RoleFactory;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Database\Factories\EmployeeFactory;
use Database\Factories\TeamFactory;

class EmployeeSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    for ($i = 1; $i <= 5; $i++) {
      for ($j = 1; $j <= 5; $j++) {
        EmployeeFactory::new()->create([
          'team_id' => $i
        ]);
      }
    }
  }
}
