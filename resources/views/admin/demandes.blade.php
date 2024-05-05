@extends('admin.base')

@section('content')
    <div class="content container m-0">
        <h3>Demandes</h3>
        <!-- Formulaire de filtre -->
        <form method="GET" class="mb-3">
            <div class="row g-3 align-items-center">
                <div class="col-md-4">
                    <label for="statut" class="col-form-label">Statut :</label>
                    <select name="statut" id="statut" class="form-select">
                        <option value="3">Tous</option>
                        <option value="0">En attente</option>
                        <option value="1">Validé</option>
                    </select>
                </div>
                <div class="col-md-2 align-self-end">
                    <button type="submit" class="btn btn-primary">Filtrer</button>
                </div>
            </div>
        </form>



        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Etudiants</th>
                <th>contacts</th>
                <th scope="col">Tuteurs</th>
                <th scope="col">Domaine</th>
                <th scope="col">Statut</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($demandes as $demande)
                <tr class="{{ $demande->statut==0 ? 'fw-bold':'' }}">
                    <td>{{ $demande->email }}</td>
                    <td>{{ $demande->telephone }}</td>
                    <td>{{ $demande->user->surname }},{{ $demande->user->name }}</td>
                    <td>{{ $demande->user->domaine->libelle }}</td>
                    <td>
                        @if($demande->statut==0)
                            <i class="fs-5 bi bi-dot text-warning"></i>
                        @else
                            <i class="fs-5 bi bi-dot text-success"></i>
                        @endif
                    </td>
                    <td>
                        <i class="fs-5 bi bi-trash text-danger"></i>
                        @if($demande->statut==0)
                            <i class="fs-5 bi bi bi-check2 text-success px-2"></i>
                        @else
                            <i class="fs-5 bi bi-file-excel text-danger px-2"></i>
                        @endif
                        <a href="{{ route('admin.etudiant.zoom',$demande->id) }}"><i class="fs-5 bi bi-eye-fill text-primary"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row">
            {{ $demandes->links() }}
        </div>
    </div>
@endsection
