@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
    <h1>Edit User</h1>
@stop

@section('content')
<form action="{{route('admin.users.update',$user)}}" method="POST" >
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputName">Name</label>
            <input type="text" name="name" name="name" id="name" value="{{old('name',$user->name)}}" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label for="inputEmail">Email</label>
            <input type="email" name="email" name="email" id="email" value="{{old('email',$user->email)}}" class="form-control">
        </div>
        {{-- <div class="form-group col-md-6">
            <label for="inputPassword">Phone</label>
            <input type="tel" name="phone" class="form-control" id="inputPhone" placeholder="+34 213-456-897">
        </div> --}}

        <div class="form-group col-md-6">
            <label for="inputPassword">Password</label>
            <input type="password" name="password" id="password" value="" class="form-control" id="inputPassword" placeholder="Password">
        </div>
        

    </div>
    {{-- <div class="form-group">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
    </div> --}}
    
    {{-- <div class="form-group">
        <label for="inputAddress2">Address 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
    </div> --}}

    {{-- <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity" placeholder="Barcelona">
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="inputState" class="form-control">
            <option selected>Choose...</option>
            <option>...</option>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip">
        </div>
    </div> --}}

    {{-- <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
            Disactive
            </label>
            
        </div>
        
    </div> --}}

    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop