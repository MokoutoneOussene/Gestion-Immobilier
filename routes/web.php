<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BailleurController;
use App\Http\Controllers\ContratBailleurController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\EncaissementController;
use App\Http\Controllers\ImmeubleController;
use App\Http\Controllers\LocataireController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MaisonController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'authentification'])->name('authentification');
Route::post('Authentification', [AuthController::class, 'login'])->name('login');
Route::post('deconnexion', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('Dashboard/home', [PageController::class, 'dashboard'])->name('dashboard');

    Route::resource('Gestion_utilisateur', UserController::class);
    Route::post('change_password/{id}', [UserController::class, 'change_password']);
    Route::post('add_profil_image/{id}', [UserController::class, 'profil_image']);

    Route::resource('Gestion_locataires', LocataireController::class);
    Route::get('Contrat/gestion_contrat/{id}', [LocataireController::class, 'contrat']);

    Route::resource('Gestion_bailleurs', BailleurController::class);
    Route::resource('Gestion_immeuble', ImmeubleController::class);

    Route::resource('Gestion_location', LocationController::class);

    Route::resource('Gestion_maisons', MaisonController::class);
    Route::get('Maison/maison_libre', [MaisonController::class, 'maison_libre'])->name('maison_libre');

    Route::resource('Gestion_encaissements', EncaissementController::class);
    Route::get('Filter/date_filter', [EncaissementController::class, 'date_filter'])->name('date_filter');
    Route::get('Impression/print_encaissement/{id}', [EncaissementController::class, 'print']);

    Route::resource('Gestion_contrat_bailleur', ContratBailleurController::class);

    Route::resource('Gestion_depense_courant', DepenseController::class);
    Route::get('Filter/depenses_date_filter', [DepenseController::class, 'date_filter'])->name('depense_date_filter');
});
