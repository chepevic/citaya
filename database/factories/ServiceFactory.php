<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
            'Consulta inicial', 
            'Revisión', 
            'Asesoría', 
            'Seguimiento', 
            'Estancia Por Estudios', 
            'Nacionalidad Española', 
            'Reagrupación familiar',
            'Renovación Tarjeta',
            'Autónomo',
            'Arraigo Social'
            
            ]),
            'description' => fake()->sentence(12),
            'duration_minutes' => fake()->randomElement([15, 30, 45, 60, 90]),
            'price' => fake()->randomFloat(2, 20, 150),
            'is_active' => true,
        ];
    }
}
