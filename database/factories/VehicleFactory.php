<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vehicle_type' => $this->faker->randomElement(['Auto', 'Camioneta', 'Motocicleta', 'Trimoto', 'Moto eléctrica']),
            'plate' => $this->faker->unique()->regexify('[A-Z]{3}-[0-9]{3}'),
            'disabled_person' => $this->faker->boolean(),
            'has_conadis_distinctive' => $this->faker->boolean(),
            'application_date' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'is_approved' => 0,
            'user_id' => User::factory()
        ];
    }
}
