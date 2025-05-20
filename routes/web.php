<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\AtelierController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Définition des routes pour l'application
|
*/

// Route vers la page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Routes pour les événements
Route::resource('evenements', EvenementController::class);

// Routes pour les experts
Route::resource('experts', ExpertController::class);

// Routes pour les ateliers
Route::resource('ateliers', AtelierController::class)->except(['index', 'show']);

