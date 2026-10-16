@extends('layouts.app')


@section('title','Crear Servicio')

@section('content')

<form action="{{route('services.store')}}" method="POST" class="bg-gray-300 rounded w-1/2 mx-auto p-5">

<div>
   <h2 class="mb-3 text-2xl">CREAR SERVICIO</h2>
   <hr>
</div>

   @csrf

     <div class="my-3">
        <label for="name" class="block mb-2">Nombre:</label>
        <input type="text" name="name" id="name" class="border-2 w-full rounded-lg p-2" value='{{old("name")}}'>
         @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
     </div>   
     <div class="my-3">
        <label for="description" class="block mb-2">Descripción:</label>
        <textarea name="description" id="description" rows="3" class="border-2 w-full rounded-lg p-2">{{old('description')}}</textarea>
         @error('description') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
     </div>   
     <div class="my-3">
        <label for="duration_minutes" class="block mb-2">Duración:</label>
        <input type="number" name="duration_minutes" id="duration_minutes" class="border-2 w-full rounded-lg p-2" min='5' max='480' step='1' value='{{old("duration_minutes")}}'>
          @error('duration_minutes') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
     </div>   
     <div class="my-3">
        <label for="price" class="block mb-2">Precio:</label>
        <input type="number" name="price" id="price" step="0.01" min=0 class="border-2 w-full rounded-lg p-2" value='{{old("price")}}'>
         @error('price') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
     </div>   
      <div class="my-3">
        <label for="is_active" class="block mb-2">Activo:</label>
         <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" id="is_active" class="border-2 p-3" value='1'  @checked(old('is_active', true))>
         @error('is_active') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
     </div>  
     <div class="my-3">
        <button type="submit" class="bg-blue-500 p-2 w-[100px] rounded-full">Crear</button>
     </div>   

</form>

@endsection