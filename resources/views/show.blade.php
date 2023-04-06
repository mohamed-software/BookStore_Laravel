@extends('layouts/books_layout')

@section('title')
{{$book->name}} | Book 
@endsection

@section('content')
@if(Auth::user()->is_admin==1)
<a  class="btn btn-primary" href="{{url('books/edit',$book->id)}}">Edit</a>
<a  class="btn btn-danger " href="{{url('books/delete',$book->id)}}">Delete</a>
@endif
<div class="search_details_content">
<h1>{{$book->name}} </h1>
<img src="{{'http://127.0.0.1/bookstore/public/'.$book->image}}" class="img-fluid" width="250px"/><br>

<h4>{{$book->desc}}</h4>
</div>



@endsection
