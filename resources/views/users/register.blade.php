@extends('layouts/books_layout')

@section('title') 
Register
@endsection


@section('content')
<!-- ERRORS -->
@if($errors->any())
@foreach($errors->all() as $errors)
<div class="alert alert-danger ">{{$errors}}</div>
@endforeach
@endif



<h1>Register</h1>
<form action="{{url('/users/save')}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" value="{{old('email')}}" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
    
        <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" value="{{old('password')}}"name="password" class="form-control" id="exampleInputPassword1">
        </div>
    
        <br>
        <!-- <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> -->
    <button type="submit" class="btn btn-primary">Register</button>
</form>


@endsection