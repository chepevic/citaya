<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::orderBy('name')->paginate(5);

       return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return View('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);

        $data=$request->validate([
           'name'=>'required|unique|string|max:255',
           'description' => 'nullable|string|max:1000',
           'duration_minutes'=>'required|numeric|between:5,480',
           'price'=>'required|numeric|decimal:0,2',
           'is_active'=>'boolean'
        ]);

        Service::create($data);

        return redirect()->route('services.index')->with('succedd','Servicio Creado Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
