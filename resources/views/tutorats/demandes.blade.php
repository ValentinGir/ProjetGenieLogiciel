@extends('layouts.app')

@section('titre', 'Mes demandes de tutorat')

@section('contenu')

    <div class="container py-5">
        <h2 class="text-center mb-4">Mes demandes de tutorat</h2>
        @if ($demandes->isEmpty())
            <div class="alert alert-info text-center" role="alert">
                Vous n'avez pas encore de demandes de tutorat.
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @foreach ($demandes as $key => $demande)
                    @php $bgColor = $key % 2 == 0 ? 'bg-light' : 'bg-white'; @endphp
                    <div class="col">
                        <div class="card {{ $bgColor }} shadow">
                            <div class="card-body">
                                <h5 class="card-title">Demande #{{ $demande->id }}</h5>
                                <ul class="list-unstyled mb-0">
                                    <li><strong>Matiere :</strong> {{ $demande->matiere->libelle }}</li>
                                    <li><strong>Téléphone :</strong> {{ $demande->telephone }}</li>
                                    <li><strong>Courriel :</strong> {{ $demande->email }}</li>
                                    <li><strong>Date de demande :</strong> {{ $demande->created_at->format('d/m/Y H:i') }}</li>
                                    <li><strong>Statut :</strong> <span class="badge bg-{{ $demande->statut ? 'success' : 'warning' }}">{{ $demande->statut ? 'Acceptée' : 'En attente' }}</span></li>
                                </ul>
                                <div class="mt-3">
                                    @if ($demande->statut == 0)
                                        <form action="{{ route('demandes.accept', $demande->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Accepter</button>
                                        </form>
                                    @else
                                        <form action="{{ route('demandes.commenter', $demande->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="commentaire">Laisser un commentaire sur l'étudiant :</label>
                                                <textarea name="commentaire" id="commentaire" class="form-control" rows="3"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Commenter</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
