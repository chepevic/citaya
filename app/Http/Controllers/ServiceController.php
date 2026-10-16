<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ServiceController extends Controller
{
    
    public function index(): View
    {
        $services = Service::orderBy('id')->paginate(5);

        return view('services.index', compact('services'));
    }

    
    public function create(): View
    {
        return view('services.create');
    }

   
    public function store(StoreServiceRequest $request): RedirectResponse
    {
        Service::create($request->validated());

        return redirect()->route('services.index')->with('success', 'Servicio Creado Correctamente');
    }

  
    public function show(Service $service):View
    {
        return view('services.show', compact('service'));
    }



    public function edit(Service $service): View
    {

        return view('services.edit', compact('service'));
    }

   
    public function update(UpdateServiceRequest $request, Service $service): RedirectResponse
    {
        $service->update($request->validated());

        return redirect()->route('services.index')->with('success', 'Servicio Actualizado Correctamente');
    }


    public function destroy(Service $service): RedirectResponse
    {
        if ($service->appointments()->exists()) {
            $service->update(['is_active' => false]);

            return redirect()->route('services.index')
                ->with('success', 'El servicio tiene citas asociadas, así que se ha desactivado.');
        }

        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Servicio eliminado correctamente.');
    }
}
