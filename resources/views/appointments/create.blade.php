@extends('layouts.app')


@section('title','Crear Cita')

@section('content')



<form action="{{route('appointments.store')}}" method="POST" class="bg-gray-300 rounded w-1/2 mx-auto p-5">
    @csrf
    <div>
        <h2 class="mb-3 text-2xl">CREAR CITA</h2>
        <hr>
    </div>

    <div class="my-3">
        <label for="name" class="block mb-2">Cliente:</label>
        <input type="hidden" name="client_id" id="client_id" value=''>
        <input type="text" name="name" id="name" class="border-2 w-full rounded-lg p-2" value='{{old("name")}}'>
        <div id="container_list">
                        <ul id="list_clients">

                        </ul>
                    </div>
        @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="my-3">
        <label for="name" class="block mb-2">Servicio:</label>
       
        <select id="service" name="service_id" class="border-2 w-full rounded-lg p-2">
            <option value="0">Seleccione el servicio</option>
            @foreach($services as $service)
              <option value="{{$service->id}}">{{$service->name}}</option>
            @endforeach
        </select>

        @error('service') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="my-3">
        <label for="name" class="block mb-2">Profesional:</label>
           <select id="professional" name="professional_id" class="border-2 w-full rounded-lg p-2">
            <option value="0">Seleccione el profesional</option>
            @foreach($professionals as $professional)
              <option value="{{$professional->id}}">{{$professional->user->name}}, {{$professional->specialty}}</option>
            @endforeach
        </select>
        @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    
    <div class="my-3">
        <label for="starts_at" class="block mb-2">Fecha y hora comienzo:</label>
        <input type="datetime-local" name="starts_at" id="starts_at" class="border-2 w-full rounded-lg p-2" value='{{old("name")}}'>
        @error('starts_at') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="my-3">
        <label for="ends_at" class="block mb-2">Fecha y hora fin:</label>
        <input type="datetime-local" name="ends_at" id="ends_at" class="border-2 w-full rounded-lg p-2" value='{{old("name")}}'>
        @error('ends_at') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

     <div class="my-3">
        <label for="notes" class="block mb-2">Notas:</label>
        <textarea name="notes" id="notes" rows="3" class="border-2 w-full rounded-lg p-2">{{old('description')}}</textarea>
         @error('notes') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
     </div> 
   <div class="my-3">
        <button type="submit" class="bg-blue-500 p-2 w-[100px] rounded-full">Crear</button>
     </div>   
</form>

<script>
    const cliente=document.querySelector("#name");
    const client_id=document.querySelector("#client_id");

    cliente.addEventListener("keyup",async()=>{
    let client_details = '';


      console.log('nombre a buscar: '+cliente.value);

        const response = await fetch(`/clients/checkByName?name=${encodeURIComponent(cliente.value)}`, {
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const data = await response.json();


        if (data.ok) {


         const clientes=data.clients;

         console.log('1. clientes: ',clientes);


         if(clientes.length>0){

         console.log('hay mas de un registro: '+clientes.length);
            list_clients.style.display='block';
            list_clients.innerHTML = '';

            for (let client of clientes) {
                console.log("entra a pintar....");
                list_clients.innerHTML += `

                    <li class='client_details' id='${client.id}'>${client.name.toUpperCase()} ${client.lastname.toUpperCase()}</li>
                
                `;
            }

            client_details = Array.from(document.querySelectorAll(".client_details"));
            
            console.log("client_details: ", client_details);
            for (let client of client_details) {
                
                
                client.addEventListener("click", () => {
                console.log('data cliente: ', client);
                const clickedId = client.getAttribute("id"); // renombrado
                console.log(clickedId);

                const client_data = clientes.find((item) => item.id == clickedId);
                console.log('cliente data:', client_data);

                list_clients.innerHTML = '';
                client_id.value = ''; // ahora sí es el input real

                client_id.value = clickedId;
                cliente.value = client_data.name+' '+client_data.lastname;
                list_clients.style.display='none';

                })
            }
                return;
            }{
                console.log("entro false....");
                list_clients.innerHTML = '';
                list_clients.style.display='none';
                cliente.value = '';
               

             }


        } else {
            openModal('El cliente no existe');
            client_id.value = '';
             list_clients.innerHTML = '';
             list_clients.style.display='none';
            return;

        }


    })


</script>

@endsection