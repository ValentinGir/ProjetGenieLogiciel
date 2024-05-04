@extends('admin.base')

@section('content')
    <div class="content">
        <h2 class="mb-4 text-center">Créer un utilisateur</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-9">
                <form id="contactForm" method="post" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input class="form-control @error('nom') is-invalid @enderror" id="nom" type="text" name="nom">
                        @error('nom')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input class="form-control @error('prenom') is-invalid @enderror" id="prenom" type="text" name="prenom"/>
                        @error('prenom')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse email</label>
                        <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" placeholder="name@example.com" name="email"/>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="telephone" class="form-label">Téléphone</label>
                        <input class="form-control @error('telephone') is-invalid @enderror" id="telephone" type="text" name="telephone"/>
                        @error('telephone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="domaine" class="form-label">Domaine d'études</label>
                        <select name="domaine" id="domaine" class="form-select">
                            @foreach($domaines as $domaine)
                                <option value="{{ $domaine->id }}">{{ $domaine->libelle }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="matieres" class="form-label">Matieres</label>
                        <select multiple name="matieres[]" id="matieres" class="form-select @error('matieres') is-invalid @enderror">
                        </select>
                        @error('matieres')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password"/>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('#domaine').change(function () {
                $.ajax({
                    url: '{{ route('getMatieres') }}',
                    type: 'GET',
                    data: {
                        'domaine_id': $('#domaine').val(),
                    },
                    dataType : 'json',
                    success: function(response) {
                        $('#matieres option').remove();
                        $.each(response, function(index, element) {
                            var newOption = $('<option>', {
                                value: element['id'],
                                text: element['libelle']
                            });
                            $('#matieres').append(newOption);
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr);
                    }
                });
            });
        });
    </script>
@endsection
