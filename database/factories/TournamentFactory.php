<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tournament;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class TournamentFactory extends Factory
{

    protected $model = Tournament::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->domainName(),
            'tier' => Tournament::TIER_3,
            'prize' => fake()->unique()->numberBetween(10000, 50000),
        ];
    }

    public function withVenue()
    {
        return $this->state(function ($attributes) {
            return [
                'venue_id' => VenueFactory::new()->create($attributes)
            ];
        });
    }
}
