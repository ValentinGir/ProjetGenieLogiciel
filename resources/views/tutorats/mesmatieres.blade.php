@extends('layouts.app')

@section('titre', 'Mes Matières')

@section('contenu')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <h2>Mes Matières</h2>
    @if ($mesMatieres->isEmpty())
    <p>Vous n'êtes associé à aucune matière pour le moment.</p>
@else
    <ul class="list-group">
        @foreach ($mesMatieres as $matiere)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $matiere->libelle }}
                <form action="{{ route('supprimer-matiere', $matiere->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
@endif

    <div class="mt-4">
        <h3>Ajouter une nouvelle matière</h3>
        <form action="{{ route('lier-matiere') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="matiere_id">Sélectionnez une matière :</label>
                <select class="form-control" name="matiere_id" id="matiere_id">
                    <option value="" disabled selected>Choisissez une matière</option>
                    @foreach ($autresMatieres as $matiere)
                        <option value="{{ $matiere->id }}">{{ $matiere->libelle }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Lier</button>
        </form>
    </div>

</div>

@endsection
