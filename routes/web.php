<?php

use App\Models\departement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CreneauController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\EmploisDuTempsController;
use App\Http\Controllers\TypeInterventionController;
use App\Http\Controllers\userController;

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
Route::resource('departement', DepartementController::class);
Route::resource('filiere',FiliereController::class);
Route::resource('classe', ClasseController::class);
Route::resource('salle',SalleController::class);
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/professeur', [App\Http\Controllers\EmploisDuTempsController::class, 'prof'])->name('professeur');

// routes des matieres
Route::resource('matiere', MatiereController::class);
//Route::get('/matiere/liste des matieres', [App\Http\Controllers\MatiereController::class, 'index'])->name('listMatiere');
//Route::get('/matiere/creation de matiere', [App\Http\Controllers\MatiereController::class, 'store'])->name('createMatiere');

// routes des notifications
Route::resource('notification', NotificationController::class);
                    
// routes des types d'interventions
Route::resource('type_intervention', TypeInterventionController::class);

// routes des creneaus
Route::resource('creneau', CreneauController::class);

// routes des emplois du temps
Route::resource('emplois_du_temps', EmploisDuTempsController::class);

Route::resource('user',userController::class);