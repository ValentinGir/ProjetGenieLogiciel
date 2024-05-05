<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TutoratsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisponibilitesController;

Route::get('/',[TutoratsController::class,"index"])->name("tutorat.index");
Route::get('/get-matieres',[TutoratsController::class,'getMatieres'])->name('getMatieres');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// routes utilisateur
Route::get('/get-tuteurs/{matiere_id}', [TutoratsController::class, 'getTuteurs'])->name('get-tuteurs');
Route::get('/contact-tuteur/{matiere_id}/{tuteur_id}', [TutoratsController::class, 'contactTuteur'])->name('contact-tuteur');
Route::get('/contact-tuteur/{matiere_id}/{tuteur_id}', [TutoratsController::class, 'showContactForm'])->name('contact-tuteur.show');
Route::post('/contact-tuteur/{matiere_id}/{tuteur_id}/send', [TutoratsController::class, 'storeDemande'])->name('contact-tuteur.send');

// routes tuteur
Route::middleware(['auth', 'isTuteur'])->group(function () {
    Route::get('/disponibilites/edit', [DisponibilitesController::class, 'edit'])->name('disponibilites.edit');
    Route::delete('/disponibilites/{disponibilite}', [DisponibilitesController::class, 'destroy'])->name('disponibilites.destroy');
    Route::get('/disponibilites/create', [DisponibilitesController::class, 'create'])->name('disponibilites.create');
    Route::post('/disponibilites', [DisponibilitesController::class, 'store'])->name('disponibilites.store');
    Route::get('/demandes', [TutoratsController::class, 'demandes'])->name('demandes.show');
    Route::post('/demandes/{demande}/accepter', [TutoratsController::class, 'accepterDemande'])->name('demandes.accept');
    Route::post('/demandes/{demande}/commenter', [TutoratsController::class, 'commenterDemande'])->name('demandes.commenter');
    Route::get('/mesmatieres', [TutoratsController::class, 'matieres'])->name('mesmatieres.show');
    Route::delete('/supprimer-matiere/{userMatiere}', [TutoratsController::class, 'supprimerMatiere'])->name('supprimer-matiere');
    Route::post('/lier-matiere', [TutoratsController::class, 'lierMatiere'])->name('lier-matiere');
    Route::post('/demandes/{demande}/archiver', [TutoratsController::class, 'archiverDemande'])->name('demandes.archiver');

});



// routes admin
Route::middleware(['auth','isAdmin'])->prefix('admin')->group(function (){
    Route::get('/', [AdminController::class,'index'])->name('admin.users');
    Route::get('/adduser', [AdminController::class,'adduser'])->name('admin.adduser');
    Route::get('/domaines', [AdminController::class,'domaines'])->name('admin.domaines');
    Route::post('/domaines/add', [AdminController::class,'storeDomaine'])->name('admin.domaines.store');
    Route::delete('/domaines/', [AdminController::class,'destroyDomaine'])->name('admin.domaines.destroy');
    Route::get('/domaines/matieres/', [AdminController::class,'getMatieresDomaine'])->name('admin.domaines.matieres');

    Route::post('/matieres/add', [AdminController::class,'storeMatiere'])->name('admin.matieres.store');
    Route::delete('/domaines/{id}', [AdminController::class,'destroyMatiere'])->name('admin.matieres.destroy');

    Route::get('/demandes', [AdminController::class,'demandes'])->name('admin.demandes');

    Route::get('/etudiants', [AdminController::class,'etudiants'])->name('admin.etudiants');
    Route::get('/etudiants/{id}', [AdminController::class,'showEtudiant'])->name('admin.etudiant.zoom');

    Route::delete('/users/{id}',[UsersController::class,'destroy'])->name('user.delete');
});

// fin route admin

require __DIR__.'/auth.php';
