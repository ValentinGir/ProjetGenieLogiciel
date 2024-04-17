@extends('layouts.app')

@section('titre', 'Créer disponibilité')

@section('contenu')

<h1>Créer disponibilité</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('disponibilites.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="jour_semaine">Jour de la semaine</label>
        <select class="form-control" id="jour_semaine" name="jour_semaine">
            <option value="lundi">Lundi</option>
            <option value="mardi">Mardi</option>
            <option value="mercredi">Mercredi</option>
            <option value="jeudi">Jeudi</option>
            <option value="vendredi">Vendredi</option>
            <option value="samedi">Samedi</option>
            <option value="dimanche">Dimanche</option>
        </select>
    </div>
    <div class="form-group">
        <label for="heure_debut">Heure de début</label>
        <select class="form-control" id="heure_debut" name="heure_debut">
            @for ($i = 0; $i < 24; $i++)
                <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00</option>
            @endfor
        </select>
    </div>
    <div class="form-group">
        <label for="heure_fin">Heure de fin</label>
        <select class="form-control" id="heure_fin" name="heure_fin">
            @for ($i = 0; $i < 24; $i++)
                <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00</option>
            @endfor
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter disponibilité</button>
</form>

@endsection
