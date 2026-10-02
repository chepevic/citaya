@extends('layouts.app')


@section('title','Nuestros Servicios')

@section('content')

 @if(session('success'))
        <div id="alert-success"
            class="fixed top-24 right-6 z-50 min-w-[420px] rounded-2xl border border-emerald-200 bg-white shadow-lg">

            <div class="flex items-start gap-3 p-4">
                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                    <i class="fa-solid fa-check"></i>
                </div>

                <div class="flex-1">
                    <p class="text-sm font-bold text-slate-900">
                        Correcto
                    </p>

                    <p class="text-sm text-slate-600 whitespace-nowrap">
                        {{ session('success') }}
                    </p>
                </div>

                <button type="button"
                    id="close-alert"
                    class="text-slate-400 hover:text-slate-700">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>
        @endif

        <a href="{{route('services.create')}}" class="bg-blue-500 p-3 mb-10 w-['200px']">Crear Servicio</a>

        <table class="mx-auto">
            <thead>
                <tr class="bg-black text-white">
                    <th class="p-3">NOMBRE</th>
                    <th class="p-3">DESCRIPCION</th>
                    <th class="p-3">DURACION</th>
                    <th class="p-3">PRECIO</th>
                    <th class="p-3">ACTIVO</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($services as $service)
                <tr>
                    <td class="p-2">{{$service->name}}</td>
                    <td class="p-2">{{$service->description}}</td>
                    <td class="p-2 text-center">{{$service->duration_minutes}} min</td>
                    <td class="p-2 text-center">{{ number_format($service->price, 2, ',', '.') }} €</td>
                    <td class="p-2 text-center">{{$service->is_active?'SI':'NO'}}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">No hay servicios registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-start sm:gap-6">
            {{$services->links()}}
        </div>
   @endsection