<?php

namespace Database\Factories;

use App\Models\Professional;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Professional>
 */
class ProfessionalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
            'user_id' => User::factory(),
            'specialty' => fake()->randomElement([
                'Abogado de extranjería',
                'Asesor fiscal',
                'Gestor administrativo',
                'Abogado laboral',
                'Traductor jurado',
            ]),
            'bio' => fake()->paragraph(),
            'is_active' => fake()->boolean(90), // 90 % activos
        ];
    }
}
