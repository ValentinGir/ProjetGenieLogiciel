@extends('layouts.app')

@section('titre', 'Creer un compte')

@section('contenu')

    <section class="py-5">
        <div class="container px-5">
            <!-- Contact form-->
            <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                <div class="text-center mb-5">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-person"></i>
                    </div>
                    <h1 class="fw-bolder">Creer un compte</h1>

                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN" method="post" action="{{ route('register') }}">
                            @csrf

                            <div class="form-floating mb-3">
                                <input class="form-control  @error('nom') is-invalid @enderror" id="nom" type="text"
                                       data-sb-validations="required,text" name="nom">
                                <label for="nom">Nom</label>
                                @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control @error('prenom') is-invalid @enderror" id="prenom" type="text"
                                       data-sb-validations="required,text" name="prenom"/>
                                <label for="prenom">Prenom</label>
                                @error('prenom')
                                <div class="invalid-feedback" >{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" placeholder="name@example.com"
                                       data-sb-validations="required,email" name="email"/>
                                <label for="email">Adresse email</label>
                                @error('email')
                                <div class="invalid-feedback" data-sb-feedback="email:email">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control @error('telephone') is-invalid @enderror" id="telephone" type="text"
                                       data-sb-validations="required,text" name="telephone"/>
                                <label for="telephone">Telephone</label>
                                @error('telephone')
                                <div class="invalid-feedback" data-sb-feedback="email:email">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <select name="domaine" id="domaine" class="form-select">
                                    @foreach($domaines as $domaine)
                                        <option value="{{ $domaine->id }}">{{ $domaine->libelle }}</option>
                                    @endforeach
                                </select>
                                <label for="nom">Domaine d'études</label>
                            </div>

                            <div class="form-floating mb-3">
                                <select multiple name="matieres" id="matieres" class="form-select @error('matieres') is-invalid @enderror">

                                </select>
                                <label for="nom">Matieres</label>
                                @error('password')
                                <div class="invalid-feedback" data-sb-feedback="email:email">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control @error('password') is-invalid @enderror" id="password" type="password"
                                       data-sb-validations="required" name="password"/>
                                <label for="password">Mot de passe</label>
                                @error('password')
                                <div class="invalid-feedback" data-sb-feedback="email:email">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br/>
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>

                            <div class="d-none" id="submitErrorMessage">
                                <div class="text-center text-danger mb-3">Error sending message!</div>
                            </div>
                            <!-- Submit Button-->
                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg" id="submitButton" type="submit">
                                    Enregistrer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

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
