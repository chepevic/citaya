<?php

use App\Http\Controllers\ApointmentController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('services', ServiceController::class);
Route::resource('appointments', ApointmentController::class);

// Route::get('/test-n1', function () {
//     DB::enableQueryLog();

//     $appointments = \App\Models\Appointment::all();
//     //$appointments = \App\Models\Appointment::with(['client', 'service'])->get();
//     foreach ($appointments as $a) {
//         $a->client->name;
//         $a->service->name;
//     }

//     return count(DB::getQueryLog()) . ' consultas';
// });
