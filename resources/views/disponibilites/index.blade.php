@extends('layouts.app')

@section('titre', 'Disponibilités')

@section('contenu')

<h1>Disponibilités</h1>

@if(isset($disponibilites) && $disponibilites->isNotEmpty())
    <ul>
        @foreach($disponibilites as $disponibilite)
            <li>{{ $disponibilite->jour_semaine }}: {{ $disponibilite->heure_debut }} - {{ $disponibilite->heure_fin }}</li>
        @endforeach
    </ul>
@else
    <p>Aucune disponibilité n'a été trouvée.</p>
@endif

<a href="{{ route('disponibilites.edit') }}" class="btn btn-primary">Modifier mes disponibilités</a>

@endsection

