@extends('layouts.app')

@section('titre', 'Nous contacter')

@section('contenu')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<section class="py-5">
    <div class="container px-5">
        <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                <h1 class="fw-bolder">Contactez-nous</h1>
                <p class="lead fw-normal text-muted mb-0">Nous serions ravis d'avoir de vos nouvelles</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" name="name" type="text" placeholder="Entrez votre nom..." required />
                            <label for="name">Nom complet</label>
                            <div class="invalid-feedback">Le nom est requis.</div>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" required />
                            <label for="email">Adresse e-mail</label>
                            <div class="invalid-feedback">Une adresse e-mail est requise.</div>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" name="phone" type="tel" placeholder="(123) 456-7890" required />
                            <label for="phone">Numéro de téléphone</label>
                            <div class="invalid-feedback">Un numéro de téléphone est requis.</div>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" name="message" type="text" placeholder="Entrez votre message ici..." style="height: 10rem" required></textarea>
                            <label for="message">Message</label>
                            <div class="invalid-feedback">Un message est requis.</div>
                        </div>
                        <div class="d-grid"><button class="btn btn-primary btn-lg" type="submit">Envoyer</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
