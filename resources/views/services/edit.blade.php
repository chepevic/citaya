@extends('layouts.app')


@section('title','Editar Servicio')

@section('content')


<form action="{{route('services.update',$service)}}" method="POST" class="bg-white w-1/2 mx-auto p-5">

   @csrf

   @method('PUT')

   <div>
    <h2>Editar Service:</h2>
   </div>

     <div class="my-3">
        <label for="name" class="block">Nombre:</label>
        <input type="text" name="name" id="name" class="border-2 w-full" value="{{old('name', $service->name)}}">
         @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
     </div>   
     <div class="my-3">
        <label for="description" class="block">Descripción:</label>
        <textarea name="description" id="description" rows="3" class="border-2 w-full">{{old('description', $service->description)}}</textarea>
         @error('description') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
     </div>   
     <div class="my-3">
        <label for="duration_minutes" class="block">Duración:</label>
        <input type="number" name="duration_minutes" id="duration_minutes" class="border-2 w-full" min='5' max='480' step='1' value="{{old('duration_minutes', $service->duration_minutes)}}">
          @error('duration_minutes') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
     </div>   
     <div class="my-3">
        <label for="price" class="block">Precio:</label>
        <input type="number" name="price" id="price" step="0.01" min=0 class="border-2 w-full" value="{{old('price', $service->price)}}">
         @error('price') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
     </div>   
      <div class="my-3">
        <label for="is_active" class="block">Activo:</label>
         <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" id="is_active" class="border-2 p-3" value='1'  @checked(old('is_active', true))>
         @error('is_active') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
     </div>  
     <div class="my-3">
        <button type="submit" class="bg-blue-500 px-4 py-2 rounded-full">Actualizar Servicio</button>
     </div>   

</form>

@endsection