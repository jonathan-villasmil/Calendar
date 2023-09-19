@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
   <div class=" d-flex p-3 align-items-center justify-content-between border border-red">

            <div class="input-group rounded">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                  <i class="fas fa-search"></i>
                </span>
            </div>    
    </div>
    <div class="d-flex p-3 align-items-center justify-content-between">
        <div class="btn-group" role="group" aria-label="Basic example">
            <button id="openModalButton" type="button" class="btn btn-success mr-3 rounded"><a class="text-white" href="{{route('users.create')}}">Create User</a></button>
            <button type="button" class="btn btn-info mr-3 rounded">Importar Csv</button>
            <button type="button" class="btn btn-primary rounded">Exportar Csv</button>
        </div>
    </div>
@stop

@section('content')
    
        <table class="table table-hover">
            <thead>
              <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
                
              </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="text-center">
                        <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <button class="btn btn-success">Show</button>
                                <button class="btn btn-primary">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                    </tr>
                @empty
                    <tr>
                        <th scope="row">No Users Found!</th>  
                    </tr>
                @endforelse
              

            </tbody>
        </table>


        {{-- Modal Create User --}}
        
        {{-- <div id="myModal" class=" none">
            <div class="">
                <h2 class="">Create a new user</h2>
                <form action="{{url('admin/users.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name">Name</label>
                        <input type="text" name="name" class="">
                    </div>
                    
                    <button type="submit" class=" btn btn-success">Import Csv</button>
                </form>
                <button id="closeModalButton" class="mt-4 text-white hover:bg-red-500 py-2 px-4 rounded bg-red-600">Cerrar</button>
            </div>
        </div> --}}
        {{-- Modal Create User --}}
    
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
    // Obtén referencias a los elementos del DOM
    // const openModalButton = document.getElementById('openModalButton')
    // const closeModalButton = document.getElementById('closeModalButton')
    // const modal = document.getElementById('myModal')
    
    
        // Abre el modal cuando se hace clic en el botón
        // openModalButton.addEventListener('click', () => {
        //     modal.classList.remove('hidden')
        //     modal.classList.add('flex')
        // });
   
        // Cierra el modal cuando se hace clic en la "X" o fuera del modal
        // closeModalButton.addEventListener('click', () => {
        //     modal.classList.add('hidden')
        // });
</script>
@stop