@extends('admin.base')

@section('content')
    <div class="content" style="margin-left: 0;"> <!-- Ajout de margin-left: 0; pour supprimer la marge -->
        @if(Session::has('deleteuser'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('deleteuser')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">Utilisateurs</h3>
            <a href="#" class="btn btn-primary">Ajouter un utilisateur</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Domaine</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $user->telephone }}</td>
                        <td>{{ $user->domaine->libelle }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
