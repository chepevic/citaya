<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
  public function definition(): array
{
    $faker = fake('es_ES');

    return [
        'name'        => $faker->firstName(),
        'lastname'    => $faker->lastName(),
        'email'       => fake()->unique()->safeEmail(),
        'phone'       => $faker->mobileNumber(),
        'address'     => $faker->streetAddress(),
        'city'        => $faker->city(),
        'province'    => $faker->state(),
        'postal_code' => $faker->postcode(),
        'notes'       => fake()->optional()->sentence(),
    ];
}
}
