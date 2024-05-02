@extends('layouts.app')

@section('titre', 'Tutorats')

@section('contenu')

    <section class="py-5" id="features">
        @if(Session::has('register'))
            <div class="alert alert-success">
                {{Session::get('register')}}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-9 offset-lg-2">
                        <h2 class="mb-4">Sélectionnez une matière</h2>
                        <form id="matiereForm">
                            @csrf
                            <div class="mb-3">
                                <label for="matiere_id" class="form-label">Choisissez une matière :</label>
                                <select class="form-select" name="matiere_id" id="matiere_id">
                                    <option disabled selected>Choisir une matière</option>
                                    @foreach($matieres as $matiere)
                                        <option value="{{ $matiere->id }}">{{ $matiere->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-9 offset-lg-2 mt-4">
                        <h2 class="mb-4">Tuteurs correspondants</h2>
                        <div id="tuteursList" class="row"></div>
                    </div>
                </div>
            </div>

    </section>
@endsection
@section('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const matiereSelect = document.getElementById('matiere_id');
            const tuteursList = document.getElementById('tuteursList');

            matiereSelect.addEventListener('change', function() {
                const selectedMatiereId = this.value;

                fetch(`/get-tuteurs/${selectedMatiereId}`)
                    .then(response => response.json())
                    .then(data => {
                        tuteursList.innerHTML = '';
                        for (let i = 0; i < data.length; i += 2) {
                            // Création d'une nouvelle ligne
                            const row = document.createElement('div');
                            row.classList.add('row', 'mb-3');

                            // Première colonne
                            const col1 = document.createElement('div');
                            col1.classList.add('col-md-6'); // Colonne Bootstrap, prenant la moitié de la ligne

                            // Tuteur 1
                            const tuteur1 = data[i];
                            const listItem1 = createTuteurCard(tuteur1, selectedMatiereId);
                            col1.appendChild(listItem1);

                            // Deuxième colonne
                            const col2 = document.createElement('div');
                            col2.classList.add('col-md-6'); // Colonne Bootstrap, prenant la moitié de la ligne

                            // Tuteur 2
                            if (i + 1 < data.length) {
                                const tuteur2 = data[i + 1];
                                const listItem2 = createTuteurCard(tuteur2, selectedMatiereId);
                                col2.appendChild(listItem2);
                            }

                            // Ajout des colonnes à la ligne
                            row.appendChild(col1);
                            row.appendChild(col2);

                            // Ajout de la ligne à la liste des tuteurs
                            tuteursList.appendChild(row);
                        }
                    })
                    .catch(error => console.error('Erreur lors de la récupération des tuteurs :', error));
            });

            // Fonction pour créer une carte de tuteur
            function createTuteurCard(tuteur, matiereId) {
                const listItem = document.createElement('div');
                listItem.classList.add('card', 'mb-3'); // Ajout des classes Bootstrap
                listItem.innerHTML = `
            <div class="card-body">
                <h5 class="card-title text-primary">${tuteur.name}</h5> <!-- Changement de couleur pour le titre -->
                <h6 class="card-subtitle mb-2 text-muted">${tuteur.tuteurDomaine}</h6> <!-- Changement de couleur pour le sous-titre -->
            </div>
        `;

                // Création d'une div pour afficher les disponibilités
                const disponibilitesDiv = document.createElement('div');
                disponibilitesDiv.classList.add('card-body', 'text-secondary'); // Changement de couleur pour les disponibilités
                disponibilitesDiv.innerHTML += `<h6 class="card-subtitle mb-2 text-dark">Disponibilités</h6>`; // Changement de couleur pour le titre
                tuteur.disponibilites.forEach(disponibilite => {
                    disponibilitesDiv.innerHTML += `
                <p class="card-text">${disponibilite.jour_semaine}: ${disponibilite.heure_debut} - ${disponibilite.heure_fin}</p>
            `;
                });
                listItem.appendChild(disponibilitesDiv);

                // Création du bouton "Contacter"
                const contactButton = document.createElement('button');
                contactButton.textContent = 'Demander';
                contactButton.classList.add('btn', 'btn-primary', 'mt-2'); // Ajout des classes Bootstrap
                contactButton.addEventListener('click', function() {
                    window.location.href = `/contact-tuteur/${matiereId}/${tuteur.id}`;
                });
                listItem.appendChild(contactButton);

                return listItem;
            }
        });

    </script>

@endsection
