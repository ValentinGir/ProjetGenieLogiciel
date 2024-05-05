@extends('admin.base')
@section('content')
    <div class="content container m-0">

        <div class="row">
            <div class="col-lg-9 col-md-9">
                <h4>Etudiants</h4>
                <table class="table table-responsive table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Noms</th>
                        <th scope="col">Emails</th>
                        <th scope="col">Telephones</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($etudiants as $etudiant)
                            <tr>
                                <td>{{ $etudiant->nom }}</td>
                                <td>{{ $etudiant->email }}</td>
                                <td>{{ $etudiant->telephone }}</td>
                                <td>
                                    <a href="{{ route('admin.etudiant.zoom',$etudiant->id) }}"><i class="fs-5 bi bi-eye-fill text-primary"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    {{ $etudiants->links() }}
                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
    <script>
        $(function () {


        });
    </script>
@endsection
