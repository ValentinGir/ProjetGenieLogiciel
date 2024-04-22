@extends('admin.base')
@section('content')
    <div class="content">
        <h3>Utilisateurs</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th>Prenom</th>
                <th>Telephone</th>
                <th scope="col">Domaine</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">#</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->telephone }}</td>
                    <td>{{ $user->domaine->libelle }}</td>
                    <td>
                        <button class="btn btn-danger">supprimer</button>
                        <buton class="btn btn-secondary">modifier</buton>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

