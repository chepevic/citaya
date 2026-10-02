@extends('layouts.app')


@section('title','Crear Servicio')

@section('content')

<form action="{{route('services.store')}}" method="POST" class="bg-white w-1/2 mx-auto p-5">

   @csrf

     <div class="my-3">
        <label for="name" class="block">Nombre:</label>
        <input type="text" name="name" id="name" class="border-2 w-full" value='{{old("name")}}'>
         @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
     </div>   
     <div class="my-3">
        <label for="description" class="block">Description:</label>
        <textarea name="description" id="description" rows="3" class="border-2 w-full">{{old('description')}}</textarea>
         @error('description') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
     </div>   
     <div class="my-3">
        <label for="duration_minutes" class="block">Duration:</label>
        <input type="text" name="duration_minutes" id="duration_minutes" class="border-2 w-full" value='{{old("duration_minutes")}}'>
          @error('duration_minutes') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
     </div>   
     <div class="my-3">
        <label for="price" class="block">Costo:</label>
        <input type="text" name="price" id="price" class="border-2 w-full" value='{{old("price")}}'>
         @error('price') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
     </div>   
      <div class="my-3">
        <label for="price" class="block">Activo:</label>
        <input type="text" name="price" id="price" class="border-2 w-full" value='{{old("price")}}'>
         @error('price') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
     </div>  
     <div class="my-3">
        <button class="bg-blue-500 p-2 w['100px']">Crear</button>
     </div>   

</form>

@endsection