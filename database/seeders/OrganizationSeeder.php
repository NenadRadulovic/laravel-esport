<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\OrganizationFactory;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    OrganizationFactory::times(10)->create();
  }
}
