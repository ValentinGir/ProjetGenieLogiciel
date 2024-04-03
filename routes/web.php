<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TutoratsController;

Route::get('/',
[TutoratsController::class, 'index'])->name('tutorats.index');
