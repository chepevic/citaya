<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Professional;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
   public function run(): void
{
    $clients = User::factory(50)->create();
    $professionals = Professional::factory(10)->create();
    $services = Service::factory(10)->create();

    Appointment::factory(200)
    ->recycle($clients)
    ->recycle($professionals)
    ->recycle($services)
    ->create();
}
}
