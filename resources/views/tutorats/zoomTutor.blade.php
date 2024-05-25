
@extends('layouts.app')
 
@section('nom','tutor')
 
 
@section('contenu')
 
<h1> {{ $tutor->nom }} {{ $tutor->prenom }} {{ $tutor->domaine }} </h1>
 
 
<div class="row col-xl-12">
@if (isset($tutor))
   <div class="col-4">
       <img src="{{ $tutor->image }}" width="600px" heighr="600px">
   </div>
 
 </div>
 
    <a type="button" class="btn btn-primary" href="{{ route('tutor.edit',[$tutor->id]) }}">Edit tutor</a> <br><br>
    <form method="post" action="{{route('tutor.destroy',[$tutor->id]) }}">
    @Csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete tutor</button>
 
@else
 
    <p>Le tuteur n'existe pas</p>
 
 
@endif
 
 
 
 
@endsection