@extends('layouts/books_layout')

@section('title')
Create Book
@endsection
@section('content')

<!-- ERRORS -->
@if($errors->any())
@foreach($errors->all() as $errors)
<div class="alert alert-danger ">{{$errors}}</div>
@endforeach
@endif






<form action="{{url('books/store')}}" method="post"
enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Book name</label>
    <input type="text" value="{{old('name')}}" name="name" class="form-control" 
    id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <input type="text" value="{{old('desc')}}" name="desc" class="form-control"
    id="exampleInputPassword1">
    </div><br>

    <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Image</label>
    <input type="file"  name="image" class="form-control"
    id="exampleInputPassword1">
    </div><br>

    <button type="submit" class="btn btn-primary">Add Book</button>
</form>
@endsection
