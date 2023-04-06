
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
<img src="{{'http://127.0.0.1/bookstore/public/'.$book->image}}" height="250px" >
<div class="card-body">
<h4>{{$book->name}}</h4> 

<a href="{{url('books/show',$book->id)}}" class="btn btn-primary">Click to read</a>
</div>

<div class="card-body">
    @if(Auth::user()->is_admin==1)
<a  class="btn btn-primary" href="{{url('books/edit',$book->id)}}">Edit</a>
<a  class="btn btn-danger " href="{{url('books/delete',$book->id)}}">Delete</a>
@endif
</div>

</div>
    </div>    
    @endforeach
    </div>
    </div>
 
    @endsection
</body>
</html>





