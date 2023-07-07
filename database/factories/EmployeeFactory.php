<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Role;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{

    protected $model = Employee::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => (string) Str::uuid(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'contact_email' => fake()->email(),
            'role_id' => RoleFactory::new()->create(),
            'team_id' => TeamFactory::new()->create()
        ];
    }
    public function withRole($role)
    {
        return $this->state(function ($attributes) use ($role) {
            return [
                'role_id' => RoleFactory::new()->create([
                    'name' => $role
                ])
            ];
        });
    }
}
