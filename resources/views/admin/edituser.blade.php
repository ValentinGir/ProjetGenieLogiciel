@extends('admin.base')

@section('content')
    <div class="content container m-0">
        <h2 class="mb-4 text-center">Modifier un utilisateur</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-9">
                <form id="contactForm" method="post" action="{{ route('user.update', $user->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ $user->name }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="surname" class="form-label">Prénom</label>
                        <input class="form-control @error('surname') is-invalid @enderror" id="surname" type="text" name="surname" value="{{ $user->surname }}">
                        @error('surname')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse email</label>
                        <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" placeholder="name@example.com" name="email" value="{{ $user->email }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="telephone" class="form-label">Téléphone</label>
                        <input class="form-control @error('telephone') is-invalid @enderror" id="telephone" type="text" name="telephone" value="{{ $user->telephone }}">
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
                        <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password">
                        <small class="form-text text-muted">Laissez ce champ vide pour ne pas modifier le mot de passe.</small>
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
                var domaine_id = $(this).val();
                $.ajax({
                    url: '{{ route('getMatieresByDomaine') }}',
                    type: 'GET',
                    data: {
                        'domaine_id': domaine_id,
                    },
                    dataType: 'json',
                    success: function (response) {
                        $('#matieres').empty();
                        $.each(response, function (index, element) {
                            var option = $('<option>', {
                                value: element.id,
                                text: element.libelle,
                            });
                            if (index === 0) {
                                option.attr('selected', 'selected');
                            }
                            $('#matieres').append(option);
                        });
                    },
                    error: function (xhr) {
                        console.log(xhr);
                    }
                });
            }).change();
        });

    </script>
@endsection

