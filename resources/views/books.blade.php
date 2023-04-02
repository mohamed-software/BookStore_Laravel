
@extends('layouts/books_layout')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All books</title>
</head>
<body>
@section('content')
<div class="container ">
<div class="row m-3">
@foreach($books as $book)
<div class="col-s-6 col-md-4">
<div class="card mb-5" style="width: 18rem;">
<img src="{{asset($book->image)}}" class="card-img-top"  >
<div class="card-body">
<small>{{asset($book->image)}}</small> 
<h4>{{$book->name}}</h4> 


</div>
    
    <a href="{{url('books/show',$book->id)}}" class="btn btn-primary">Click to read</a><br>
    @if(Auth::user()->is_admin==1)
<a  class="btn btn-primary" href="{{url('books/edit',$book->id)}}">Edit</a>
<a  class="btn btn-danger " href="{{url('books/delete',$book->id)}}">Delete</a>
</div>
@endif
    </div>    
    @endforeach
    </div>
    </div>
 
    @endsection
</body>
</html>





