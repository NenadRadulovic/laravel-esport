<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\RoleFactory;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    foreach (Role::ROLES as $role) {
      RoleFactory::new()->create([
        'name' => $role
      ]);
    }
  }
}
