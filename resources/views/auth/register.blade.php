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
                                <input class="form-control" id="nom" type="text"
                                       data-sb-validations="required,text"/>
                                <label for="nom">Nom</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="prenom" type="text"
                                       data-sb-validations="required,text"/>
                                <label for="prenom">Prenom</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com"
                                       data-sb-validations="required,email"/>
                                <label for="email">Adresse email</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.
                                </div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="telephone" type="text"
                                       data-sb-validations="required,text"/>
                                <label for="nom">Telephone</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="domaine" id="domaine" class="form-select">
                                    <option value="domaine1">domaine1</option>
                                </select>
                                <label for="nom">Domaine d'études</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="password" type="password"
                                       data-sb-validations="required"/>
                                <label for="email">Mot de passe</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.
                                </div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
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
                                <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Se
                                    connecter
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

