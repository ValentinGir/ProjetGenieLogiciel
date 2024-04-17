@extends('layouts.app')

@section('titre', 'Disponibilités')

@section('contenu')

<h1>Disponibilités</h1>

@if(isset($disponibilites) && $disponibilites->isNotEmpty())
    <ul class="list-group">
        @foreach($disponibilites as $disponibilite)
            <li class="list-group-item">
                <div class="row">
                    <div class="col">{{ $disponibilite->jour_semaine }}: {{ $disponibilite->heure_debut }} - {{ $disponibilite->heure_fin }}</div>
                    <div class="col-auto">
                        <form action="{{ route('disponibilites.destroy', $disponibilite->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@else
    <p>Aucune disponibilité n'a été trouvée.</p>
@endif


<a href="{{ route('disponibilites.create') }}" class="btn btn-primary">Ajouter disponibilité</a>

@endsection
