<?php

namespace App\Http\Controllers;

use App\Models\Professional;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ApointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        return view('appointments.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {

      $services = Service::orderBy('name')->get(['id', 'name']);
      $professionals = Professional::with('user:id,name')
    ->get(['id', 'user_id', 'specialty']);


        return view('appointments.create', compact('services', 'professionals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
