<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\Client;
use App\Models\Professional;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => Client::factory(),
            'professional_id' => Professional::factory(),
            'service_id' => Service::factory(),
            'starts_at' => fake()->dateTimeBetween('-30 days', '+60 days'),
            'ends_at' => fn(array $attributes) => Carbon::parse($attributes['starts_at'])
                ->addMinutes(Service::find($attributes['service_id'])->duration_minutes),
            'status' => fake()->randomElement(['pending', 'confirmed', 'cancelled', 'completed']),
            'notes' => fake()->sentence(12)
        ];
    }
}
