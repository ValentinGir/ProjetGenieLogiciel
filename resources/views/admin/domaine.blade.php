@extends('admin.base')
@section('content')
    <div class="content container">

        <div class="row">
            <div class="col-lg-9 col-md-9 offset-md-1 offset-lg-1">
                @if(Session::has('storeDomaineSucces'))
                    <div class="alert alert-success">
                        {{Session::get('storeDomaineSucces')}}
                    </div>
                @endif
                <form id="contactForm" method="post" class="mb-5" action="{{ route('admin.domaines.store') }}">
                    @csrf

                    <div class="form-floating mb-3">
                        <input class="form-control @error('domaine') is-invalid @enderror" id="domaine" type="text"
                               data-sb-validations="required" name="domaine"/>
                        <label for="email">Domaine</label>

                        @error('domaine')
                        <div class="invalid-feedback" data-sb-feedback="email:email">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-primary btn-sm" id="submitButton" type="submit">
                            Ajouter
                        </button>
                    </div>
                </form>

                <h4>Domaines</h4>
                <table class="table table-responsive table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($domaines as $domaine)
                        <tr>
                            <th scope="row">#</th>
                            <td>{{ $domaine->libelle }}</td>

                            <td>
                                <button id="{{ $domaine->id }}"
                                        class="btn btn-danger btnDomaineMatieres">supprimer
                                </button>
                                <buton class="btn btn-secondary">modifier</buton>
                                <button id="{{ $domaine->id }}" data-bs-toggle="modal" data-bs-target="#afficheMatieres"
                                        class="btn btn-primary">matieres
                                </button>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!--  liste des fenetres modales de la page -->

    <!--  modal d'affiche des matieres du domaines -->

    <div class="modal fade" id="afficheMatieres" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Matières</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    <!--  modal de modification du domaines -->
@endsection
@section('scripts')
    <script>
        $(function () {
            $(".btnDomaineMatieres").on("click", function (e) {
                e.preventDefault();
                let idButton = $(this).attr('id');
                let url = '{{ route('admin.domaines.destroy') }}';
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data:{
                        'id':idButton,
                        '_token':'{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function (response) {
                        if(response===0) {
                            swal("Suppression", "suppression réussie!", "success");
                            location.reload();
                        }
                        else{
                            swal("Suppression", "impossible de supprimer", "error");
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });

            });
        });
    </script>
@endsection
