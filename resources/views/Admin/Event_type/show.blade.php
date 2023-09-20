@extends('adminlte::page')

@section('title', 'Show Event type')

@section('content_header')
    <h1>Show Event type</h1>
@stop

@section('content')
    <div class="d-flex p-3 align-items-center justify-content-between">
        <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">ID: {{$eventType->id}}</li>
                <li class="list-group-item">Name: {{$eventType->name}}</li>
                <li class="list-group-item">Description: {{$eventType->description}}</li>
                <li class="list-group-item">Color: <span class="text-white" style="background-color:{{$eventType->color}};  padding: 4px 8px; ">{{$eventType->color}}</span> </li>
          </div>
    </div>
@stop

@section('css')
    
@stop

@section('js')
    <script>

    </script>
@stop