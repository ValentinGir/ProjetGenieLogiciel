@extends('layouts.app')

@section('titre', 'Tutorats')

@section('contenu')

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h2 class="card-title mb-0">Envoyer une demande à {{ $tuteur->name }}</h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><strong>Matière :</strong> {{ $matiere->libelle }}</p>
                        <p class="card-text"><strong>Horaires :</strong></p>
                        <ul class="list-group mb-4">
                            @foreach ($tuteur->disponibilites as $disponibilite)
                                <li class="list-group-item">{{ $disponibilite->jour_semaine }} : {{ $disponibilite->heure_debut }} - {{ $disponibilite->heure_fin }}</li>
                            @endforeach
                        </ul>
                        <form action="{{ route('contact-tuteur.send', [$matiere->id, $tuteur->id]) }}" method="post">
                            @csrf
                            <input type="hidden" name="tuteur_id" value="{{ $tuteur->id }}">
                            <input type="hidden" name="matiere_id" value="{{ $matiere->id }}">

                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom :</label>
                                <input type="text" id="nom" name="nom" class="form-control @error('nom') is-invalid @enderror" required>
                                @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="telephone" class="form-label">Téléphone :</label>
                                <input type="tel" id="telephone" name="telephone" class="form-control @error('telephone') is-invalid @enderror" required>
                                @error('telephone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email :</label>
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
