<?php
use App\Http\Controllers\TutoratsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisponibilitesController;

Route::get('/',[TutoratsController::class,"index"])->name("tutorat.index");
Route::get('/get-matieres',[TutoratsController::class,'getMatieres'])->name('getMatieres');
Route::get('/disponibilites/edit', [DisponibilitesController::class, 'edit'])->name('disponibilites.edit');
Route::delete('/disponibilites/{disponibilite}', [DisponibilitesController::class, 'destroy'])->name('disponibilites.destroy');
Route::get('/disponibilites/create', [DisponibilitesController::class, 'create'])->name('disponibilites.create');
Route::post('/disponibilites', [DisponibilitesController::class, 'store'])->name('disponibilites.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
