@extends('layouts.app')

@section('titre', 'Disponibilités')

@section('contenu')

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1 class="mb-4">Disponibilités</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('disponibilites.create') }}" class="btn btn-primary">Ajouter disponibilité</a>
            </div>
        </div>

        @if(isset($disponibilites) && $disponibilites->isNotEmpty())
            <ul class="list-group mt-4">
                @foreach($disponibilites as $disponibilite)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>{{ $disponibilite->jour_semaine }}: {{ $disponibilite->heure_debut }} - {{ $disponibilite->heure_fin }}</div>
                        <div>
                            <form action="{{ route('disponibilites.destroy', $disponibilite->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="mt-4">Aucune disponibilité n'a été trouvée.</p>
        @endif
    </div>

@endsection
