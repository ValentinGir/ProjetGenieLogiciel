<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TutoratsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisponibilitesController;

Route::get('/',[TutoratsController::class,"index"])->name("tutorat.index");

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard')
*/

Route::get('/get-matieres',[TutoratsController::class,'getMatieres'])->name('getMatieres');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/disponibilites/edit', [DisponibilitesController::class, 'edit'])->name('disponibilites.edit');
    Route::delete('/disponibilites/{disponibilite}', [DisponibilitesController::class, 'destroy'])->name('disponibilites.destroy');
    Route::get('/disponibilites/create', [DisponibilitesController::class, 'create'])->name('disponibilites.create');
    Route::post('/disponibilites', [DisponibilitesController::class, 'store'])->name('disponibilites.store');

});


// routes admin
Route::middleware(['auth','isAdmin'])->prefix('admin')->group(function (){
    Route::get('/', [AdminController::class,'index'])->name('admin.users');
    Route::get('/domaines', [AdminController::class,'domaines'])->name('admin.domaines');
    Route::post('/domaines/add', [AdminController::class,'storeDomaine'])->name('admin.domaines.store');
    Route::delete('/domaines/', [AdminController::class,'destroyDomaine'])->name('admin.domaines.destroy');
    Route::get('/domaines/matieres/', [AdminController::class,'getMatieresDomaine'])->name('admin.domaines.matieres');

    Route::post('/matieres/add', [AdminController::class,'storeMatiere'])->name('admin.matieres.store');
    Route::delete('/domaines/{id}', [AdminController::class,'destroyMatiere'])->name('admin.matieres.destroy');
});

// fin route admin

require __DIR__.'/auth.php';
