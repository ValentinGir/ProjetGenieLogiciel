@extends('admin.base')
@section('content')
    <div class="content">
        @if(Session::has('deleteuser'))
            <div class="alert alert-success">
                {{Session::get('deleteuser')}}
            </div>
        @endif
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
                        <i class="fs-5 bi bi-trash text-danger "></i>
                        <i class="fs-5 bi bi-pencil-square text-primary px-2"></i>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

