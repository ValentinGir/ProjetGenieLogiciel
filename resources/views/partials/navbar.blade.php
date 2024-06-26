<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        @if((auth()->check() && Auth::user()->role->id!=2) || !auth()->check())
            <a class="navbar-brand" href="{{ route('tutorat.index') }}">Accueil</a>
        @endif
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                   @if(Auth::user()->role->libelle!=="admin")
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('disponibilites.edit') }}">Mes disponibilités</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('mesmatieres.show') }}">Mes matières</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('demandes.show') }}">Demandes</a>
                        </li>
                   @endif
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn nav-link">Déconnexion</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Créer un compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
