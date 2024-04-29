@extends('layouts.app')

@section('titre', 'Mes demandes de tutorat')

@section('contenu')

<div class="container">
    <h2>Mes demandes de tutorat</h2>
    @if ($demandes->isEmpty())
        <p>Vous n'avez pas encore de demandes de tutorat.</p>
    @else
        <ul class="list-group">
            @foreach ($demandes as $key => $demande)
                @php $bgColor = $key % 2 == 0 ? 'bg-white' : 'bg-light'; @endphp
                <li class="list-group-item mb-3 {{ $bgColor }}">
                    <strong>Téléphone :</strong> {{ $demande->telephone }}<br>
                    <strong>Courriel :</strong> {{ $demande->email }}<br>
                    <strong>Date de demande :</strong> {{ $demande->created_at->format('d/m/Y H:i') }}<br>
                    <strong>Statut :</strong> {{ $demande->statut ? 'Acceptée' : 'En attente' }}<br>
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
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
