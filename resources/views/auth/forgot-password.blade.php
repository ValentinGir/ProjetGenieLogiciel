@extends('layouts.app')

@section('titre', 'Connexion')

@section('contenu')
    <section class="py-5">
        <div class="container px-5">
            <!-- Contact form-->
            <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                <div class="text-center mb-5">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-person"></i>
                    </div>
                    <h1 class="fw-bolder">Réinitialiser le mot de passe</h1>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN" method="post"
                              action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control @error('email') is-invalid @enderror" id="email"  type="email" name="email" :value="old('email')" required autofocus
                                       data-sb-validations="required,email"/>
                                <label for="email">Adresse email</label>
                                @error('email')
                                <div class="invalid-feedback" data-sb-feedback="email:email">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg" id="submitButton" type="submit">
                                    Envoyer
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
