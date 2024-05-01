
@extends('admin.base')
@section('content')
    <div class="content container">
        <h4>{{ $nom }}</h4>
        <div class="row">
            <div class="col-lg-5 col-md-5">
                <h4></h4>
                <table class="table table-responsive table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Domaine</th>
                        <th scope="col">tuteur</th>
                        <th scope="col">Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($demandes as $demande)
                        <tr>
                            <td >{{ $demande->user->surname }},{{ $demande->user->name }}</td>
                            <td>{{ $demande->user->domaine->libelle }}</td>
                            <td >{{ $demande->email }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-lg-6 col-md-6">
                <h4 class="text-dark">Commentaires</h4>
                <div class="card">
                    @if(count($commentaires)>0)
                        @foreach($commentaires as $commentaire)

                            <div class="card-body">
                               <p>
                                   <b>{{ $commentaire->demande->user->name }}</b>
                                   <em class="text-muted">{{ $commentaire->created_at }}</em>
                               </p>
                                {{ $commentaire->contenu }}
                            </div>
                        @endforeach
                    @else
                        <span>Aucun commentaires</span>
                    @endif
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
