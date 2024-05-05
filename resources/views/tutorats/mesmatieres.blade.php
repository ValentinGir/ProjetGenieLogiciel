@extends('layouts.app')

@section('titre', 'Mes Matières')

@section('contenu')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0">Mes Matières</h2>
                    </div>
                    <div class="card-body">
                        @if ($mesMatieres->isEmpty())
                            <p class="card-text">Vous n'êtes associé à aucune matière pour le moment.</p>
                        @else
                            <ul class="list-group">
                                @foreach ($mesMatieres as $matiere)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $matiere->libelle }}
                                        <form action="{{ route('supprimer-matiere', $matiere->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-4 mb-2">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Ajouter une nouvelle matière</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('lier-matiere') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="matiere_id">Sélectionnez une matière :</label>
                                <select class="custom-select" name="matiere_id" id="matiere_id">
                                    <option value="" disabled selected>Choisissez une matière</option>
                                    @foreach ($autresMatieres as $matiere)
                                        <option value="{{ $matiere->id }}">{{ $matiere->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-2">Lier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
