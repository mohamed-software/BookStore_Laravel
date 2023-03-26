@extends('layouts/books_layout')

@section('title')
{{$book->name}} | Book 
@endsection

@section('content')
@if(Auth::user()->is_admin==1)
<a  class="btn btn-primary" href="{{url('books/edit',$book->id)}}">Edit</a>
<a  class="btn btn-danger " href="{{url('books/delete',$book->id)}}">Delete</a>
@endif
<h1>{{$book->name}} </h1>
<h4>{{$book->desc}}</h4>
<img src="{{asset($book->image)}}" class="img-fluid" width="500"/>
@endsection
