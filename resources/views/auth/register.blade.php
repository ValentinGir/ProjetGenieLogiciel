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

                    <!-- Champ nom -->
                    <div class="form-floating mb-3">
                        <input class="form-control @error('name') is-invalid @enderror" id="nom" type="text" name="name" value="{{ old('name') }}" required>
                        <label for="nom">Nom</label>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Champ prénom -->
                    <div class="form-floating mb-3">
                        <input class="form-control @error('prenom') is-invalid @enderror" id="prenom" type="text" name="prenom" value="{{ old('prenom') }}" required>
                        <label for="prenom">Prénom</label>
                        @error('prenom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Champ email -->
                    <div class="form-floating mb-3">
                        <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                        <label for="email">Adresse email</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Champ téléphone -->
                    <div class="form-floating mb-3">
                        <input class="form-control @error('telephone') is-invalid @enderror" id="telephone" type="text" name="telephone" value="{{ old('telephone') }}" required>
                        <label for="telephone">Téléphone</label>
                        @error('telephone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Champ domaine d'étude -->
                    <div class="form-floating mb-3">
                        <select name="domaine" id="domaine" class="form-select @error('domaine') is-invalid @enderror">
                            <option value="domaine1">Domaine 1</option>
                            <!-- Ajoutez d'autres options de domaine ici si nécessaire -->
                        </select>
                        <label for="domaine">Domaine d'étude</label>
                        @error('domaine')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Champ mot de passe -->
                    <div class="form-floating mb-3">
                        <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" required>
                        <label for="password">Mot de passe</label>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Champ de confirmation de mot de passe -->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required>
                        <label for="password_confirmation">Confirmer le mot de passe</label>
                    </div>

                    <!-- Bouton de soumission -->
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Se connecter</button>
                    </div>
                </form>

                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

