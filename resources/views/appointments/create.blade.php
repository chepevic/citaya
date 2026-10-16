@extends('layouts.app')


@section('title','Crear Cita')

@section('content')

<pre>{{$professionals->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)}}</pre>

<form action="{{route('appointments.store')}}" method="POST" class="bg-gray-300 rounded w-1/2 mx-auto p-5">
    @csrf
    <div>
        <h2 class="mb-3 text-2xl">CREAR CITA</h2>
        <hr>
    </div>

    <div class="my-3">
        <label for="name" class="block mb-2">Cliente:</label>
        <input type="text" name="name" id="name" class="border-2 w-full rounded-lg p-2" value='{{old("name")}}'>
        @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="my-3">
        <label for="name" class="block mb-2">Servicio:</label>
       
        <select name="" id="service" name="service_id" class="border-2 w-full rounded-lg p-2">
            <option value="0">Seleccione el servicio</option>
            @foreach($services as $service)
              <option value="{{$service->id}}">{{$service->name}}</option>
            @endforeach
        </select>

        @error('service') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="my-3">
        <label for="name" class="block mb-2">Profesional:</label>
           <select name="" id="professional" name="professional_id" class="border-2 w-full rounded-lg p-2">
            <option value="0">Seleccione el profesional</option>
            @foreach($professionals as $professional)
              <option value="{{$professional->id}}">{{$professional->user->name}}, {{$professional->specialty}}</option>
            @endforeach
        </select>
        @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    
    <div class="my-3">
        <label for="name" class="block mb-2">Fecha y hora:</label>
        <input type="text" name="name" id="name" class="border-2 w-full rounded-lg p-2" value='{{old("name")}}'>
        @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="my-3">
        <label for="name" class="block mb-2">Fecha y hora:</label>
        <input type="text" name="name" id="name" class="border-2 w-full rounded-lg p-2" value='{{old("name")}}'>
        @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

     <div class="my-3">
        <label for="description" class="block mb-2">Notas:</label>
        <textarea name="description" id="description" rows="3" class="border-2 w-full rounded-lg p-2">{{old('description')}}</textarea>
         @error('description') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
     </div> 
   <div class="my-3">
        <button type="submit" class="bg-blue-500 p-2 w-[100px] rounded-full">Crear</button>
     </div>   
</form>



@endsection