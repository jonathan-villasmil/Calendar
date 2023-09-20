@extends('adminlte::page')

@section('title', 'Show User')

@section('content_header')
    <h1>Show User</h1>
@stop

@section('content')
    <div class="d-flex p-3 align-items-center justify-content-between">
        <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">ID: {{$user->id}}</li>
                <li class="list-group-item">Name: {{$user->name}}</li>
                <li class="list-group-item">Email: {{$user->emal}}</li>
          </div>
    </div>
@stop

@section('css')
    
@stop

@section('js')
    <script>

    </script>
@stop