@extends('layouts.app')

@section('titre', 'Tutorats')

@section('contenu')

<div class="container">
    <h2>Contactez {{ $tuteur->name }}</h2>
    <p>Matière : {{ $matiere->libelle }}</p>
    <p>Horaires :</p>
    <ul>
        @foreach ($tuteur->disponibilites as $disponibilite)
            <li>{{ $disponibilite->jour_semaine }} : {{ $disponibilite->heure_debut }} - {{ $disponibilite->heure_fin }}</li>
        @endforeach
    </ul>
    <form action="{{ route('contact-tuteur.send', [$matiere->id, $tuteur->id]) }}" method="post">
        @csrf
        <input type="hidden" name="tuteur_id" value="{{ $tuteur->id }}">
        <input type="hidden" name="matiere_id" value="{{ $matiere->id }}">
        
        <div class="form-group">
            <label for="telephone">Téléphone :</label>
            <input type="tel" id="telephone" name="telephone" class="form-control" required>
            @error('telephone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" class="form-control" required>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div><br>
    
        
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>

@endsection
