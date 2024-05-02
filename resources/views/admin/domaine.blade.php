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
                @if(Session::has('deleteMatiereSucces'))
                    <div class="alert alert-success">
                        {{Session::get('deleteMatiereSucces')}}
                    </div>
                @endif
                @if(Session::has('storeMatiereSucces'))
                    <div class="alert alert-success">
                        {{Session::get('storeMatiereSucces')}}
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

                                <i  id="{{ $domaine->id }}" class="fs-5 bi bi-trash text-danger btnDomaineMatieres"></i>
                                <i class="fs-5 bi bi-pencil-square text-primary px-2"></i>
                                <i id="{{ $domaine->id }}" data-bs-toggle="modal" data-bs-target="#afficheMatieres" class="fs-5 bi bi-eye-fill text-primary btnAfficherMatieres"></i>
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

                    <form id="contactForm" method="post" class="mb-5" action="{{ route('admin.matieres.store') }}">
                        @csrf

                        <div class="form-floating mb-3">
                            <input class="form-control @error('matiere') is-invalid @enderror" id="matiere" type="text"
                                   data-sb-validations="required" name="matiere" required/>
                            <label for="email">Nom </label>

                            @error('matiere')
                            <div class="invalid-feedback" data-sb-feedback="email:email">{{ $message }}</div>
                            @enderror
                            <input type="hidden" id="idDomaine" name="id_domaine">
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary btn-sm" id="submitButton" type="submit">
                                Ajouter
                            </button>
                        </div>

                    </form>


                    <table class="table table-responsive table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
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

            function ajouterNouvelleLigneATableMatieres(valeur, id, table) {
                // Crée une nouvelle ligne avec deux cellules
                var nouvelleLigne = $('<tr>');
                var cellule1 = $('<th>').text("#");
                cellule1.attr('scope', 'row');
                var cellule2 = $('<td>').text(valeur);
                var cellule3 = $('<td>');

                var formulaire = $('<form>');
                formulaire.attr('action', "{{ route('admin.matieres.destroy','id') }}".replace('id', id));
                formulaire.attr('method', 'post');

                // Ajouter le jeton CSRF
                var csrfInput = $('<input>');
                csrfInput.attr('type', 'hidden');
                csrfInput.attr('name', '_token');
                csrfInput.val('{{ csrf_token() }}');
                formulaire.append(csrfInput);
                formulaire.append('<input type="hidden" name="_method" value="DELETE">');

                // Créer le bouton de soumission
                var boutonSupprimer = $('<button>');
                boutonSupprimer.attr('type', 'submit');
                boutonSupprimer.addClass('btn btn-danger');
                boutonSupprimer.text('supprimer');

                // Ajouter le bouton au formulaire
                formulaire.append(boutonSupprimer);

                cellule3.append(formulaire);

                // Ajoute les cellules à la ligne
                nouvelleLigne.append(cellule1, cellule2, cellule3);

                // Ajoute la ligne à la tbody de la table
                table.append(nouvelleLigne);
            }

            $('.btnAfficherMatieres').on('click', function (e) {
                e.preventDefault();

                let idButton = $(this).attr('id');
                $('#idDomaine').val(idButton);

                let url = '{{ route('admin.domaines.matieres') }}';
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        'id': idButton
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.original.length > 0) {
                            $("#afficheMatieres table tbody").empty();
                            let tableMatieres = $("#afficheMatieres table tbody");
                            $.each(response.original, function (index, value) {
                                ajouterNouvelleLigneATableMatieres(value.libelle, value.id, tableMatieres);
                            });
                        } else {

                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });


            $(".btnDomaineMatieres").on("click", function (e) {
                e.preventDefault();
                let idButton = $(this).attr('id');
                let url = '{{ route('admin.domaines.destroy') }}';
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        'id': idButton,
                        '_token': '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response === 0) {
                            swal("Suppression", "suppression réussie!", "success");
                            location.reload();
                        } else {
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
