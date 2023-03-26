
@extends('layouts/books_layout')

@section('title')
All books
@endsection
@section('content')
@foreach($books as $book)
<h1><a href="{{url('books/show',$book->id)}}">{{$book->name}} </a> </h1>
<p>{{$book->desc}}</p>

@if(Auth::user()->is_admin==1)
<a  class="btn btn-primary" href="{{url('books/edit',$book->id)}}">Edit</a>
<a  class="btn btn-danger " href="{{url('books/delete',$book->id)}}">Delete</a>
@endif

@endforeach
@endsection
