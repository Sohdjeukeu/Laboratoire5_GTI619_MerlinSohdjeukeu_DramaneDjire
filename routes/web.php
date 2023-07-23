<?php

use App\Http\Controllers\AdministrateurController;
use App\Http\Controllers\PreposeAuxClientsAffaireController;
use App\Http\Controllers\PreposeAuxClientsResidentielsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/post',function(){

    return Inertia::render('LesComposantReact/UnComposant');
});

// creer les routes pour les administrateurs
Route::middleware(['auth','role:Administrateur'])->controller(AdministrateurController::class)->group(function(){

    // Route pour l'authentification des Administrateurs
    Route::get('/PageAdmin','authentifierAdministrateur');


    // creer d'autres routes pour les administrateurs
    Route::get('/InsererAdmin','insererAdministrateur');

});


// Route pour les Préposé aux clients résidentiels
Route::middleware(['auth','role:Préposé aux clients résidentiels'])->controller(PreposeAuxClientsResidentielsController::class)->group(function(){

    // Route pour l'authentification des Administrateurs
    Route::get('/PagePreposeAuxClientsResidentiels','authentifierPreposeAuxClientsResidentiels');

});




// Route pour les Préposé aux clients d'affaire
Route::middleware(['auth','role:Préposé aux clients d’affaire']) -> controller(PreposeAuxClientsAffaireController::class)->group(function(){

    // Route pour l'authentification des Administrateurs
    Route::get('/PagePreposeAuxClientsAffaire','authentifierPreposeAuxClientsAffaire');

    // creer d'autres routes


});





require __DIR__.'/auth.php';
