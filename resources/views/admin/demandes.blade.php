@extends('admin.base')
@section('content')
    <div class="content">
        <h3>Demandes</h3>
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
                <tr>

                    <td >{{ $demande->email }}</td>
                    <td>{{ $demande->telephone }}</td>
                    <td >{{ $demande->user->surname }},{{ $demande->user->name }}</td>
                    <td>{{ $demande->user->domaine->libelle }}</td>
                    <td >
                        @if($demande->statut==0)
                            <i class="fs-5 bi bi-dot text-warning"></i>
                        @else
                            <i class="fs-5 bi bi-dot text-success"></i>
                        @endif
                    </td>
                    <td >
                        <i class="fs-5 bi bi-trash text-danger "></i>
                        <i class="fs-5 bi bi-pencil-square text-primary px-2"></i>
                        <a href=""><i class="fs-5 bi bi-eye-fill text-primary"></i></a>
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

