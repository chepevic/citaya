@extends('layouts.app')


@section('title','Citas')

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



<a href="{{route('appointments.create')}}" class="bg-blue-500 p-3 mb-10 w-[200px] rounded-full">Crear Cita</a>

<table class="mx-auto my-10">
    <thead>
        <tr class="bg-black text-white">
            <th class="p-3">Fecha</th>
            <th>Hora</th>
            <th>Cliente</th>
            <th>Servicio</th>
            <th>Profesional</th>
            <th>status</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($appointments as $appointment)
        <tr>
            <td class="p-3">
                {{$appointment->starts_at->format('d/m/y')}}
            </td>
            <td>
                {{$appointment->starts_at->format('H:i')}}
            </td>
            <td>
                {{$appointment->client->name}} {{$appointment->client->lastname}}
            </td>
            <td>
                {{$appointment->service->name}}
            </td>
            <td>
                {{$appointment->professional->name}}
            </td>
            <td>
                @switch($appointment->status)

                @case('pending')
                Pendiente
                @break

                @case('cancelled')
                Cancelada
                @break

                @case('completed')
                Completada
                @break

                @case('completed')
                Completada
                @break

                @default
                Pendiente


                @endswitch
            </td>
            <td>
                <div class="grid grid-cols-2 gap-2">
                    <a href="{{route('appointments.edit',$appointment)}}" class="bg-yellow-500 text-center rounded py-2"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form action="{{route('appointments.destroy',$appointment)}}" method="POST" onsubmit="return confirm('está seguro de borrar este servicio y sus archivos')">
                        @CSRF
                        @method('DELETE')

                        <button class="bg-red-500 text-center rounded py-2 px-2 text-white" type="submit"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
            </td>

        </tr>

        @empty
        <tr>
            <td colspan="6">No hay citas.</td>
        </tr>
        @endforelse
    </tbody>
</table>
{{ $appointments->links() }}

<script>
    const alert_success = document.querySelector("#alert-success");

    setTimeout(() => {

        alert_success.style.display = 'none';

    }, 3000)
</script>

@endsection