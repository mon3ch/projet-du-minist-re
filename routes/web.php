<?php

use App\Http\Controllers\ActionCharterController;
use App\Http\Controllers\DelegationController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\EtablissementRessourcesHumainesSousSupervisionController;
use App\Http\Controllers\EtablissementRhController;
use App\Http\Controllers\EtablissementSousSupervisionController;
use App\Http\Controllers\FinancementController;
use App\Http\Controllers\GouvernoratController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoiController;
use App\Http\Controllers\NamesEtablissementsController;
use App\Http\Controllers\NatureProjetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\QuatreAnalysesController;
use App\Http\Controllers\TypeProjetController;
use App\Http\Controllers\VoitureEtablissementController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
Route::get('/dashbord', [LoginController::class, 'index'])->name('dashbord')->middleware('auth');
Route::get('/', [LoginController::class, 'show'])->name('login.show');
Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::middleware('guest')->group(function () {
    Route::get('/signup', [LoginController::class, 'signupShow'])->name('signup.show')->middleware('guest');
    Route::post('/signup', [LoginController::class, 'signup'])->name('signup')->middleware('guest');
    Route::post('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');

});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::resource('profile', ProfileController::class)->middleware('auth'); 
Route::post('/profile/toggle-status', [ProfileController::class, 'toggleStatus'])->name('profile.toggleStatus')->middleware('auth');
Route::resource('gouvernorat', GouvernoratController::class)->middleware('auth');
Route::resource('delegation', DelegationController::class)->middleware('auth');
Route::get('/get-delegations/{gouvernorat_id}', [DelegationController::class, 'getByGouvernorat']);
Route::resource('financement', FinancementController::class)->middleware('auth');
Route::resource('etablissement', EtablissementController::class)->middleware('auth');
Route::middleware('auth')->group(function () {
    Route::get('/names_etablissements', [NamesEtablissementsController::class, 'index'])->name('names_etablissements.index');
    Route::get('/names_etablissements/create', [NamesEtablissementsController::class, 'create'])->name('names_etablissements.create');
    Route::post('/names_etablissements', [NamesEtablissementsController::class, 'store'])->name('names_etablissements.store');
    Route::get('/names_etablissements/{names_etablissements}/edit', [NamesEtablissementsController::class, 'edit'])->name('names_etablissements.edit');
    Route::put('/names_etablissements/{names_etablissements}', [NamesEtablissementsController::class, 'update'])->name('names_etablissements.update');
    Route::delete('/names_etablissements/{names_etablissements}', [NamesEtablissementsController::class, 'destroy'])->name('names_etablissements.destroy');
});

Route::resource('nature_projet', NatureProjetController::class)->middleware('auth');
Route::resource('type_projet', TypeProjetController::class)->middleware('auth');
Route::get('/get-types/{nature_id}', [TypeProjetController::class, 'getTypes']);
Route::get('/get-names-etablissements/{etablissement_id}/{gouvernorat_id}', [NamesEtablissementsController::class, 'getNamesEtablissements']);
Route::get('/etablissement/{id}/programme', [EtablissementController::class, 'getProgramme']);
Route::resource('programme', ProgrammeController::class)->middleware('auth');
Route::get('/get-etablissements/{programmeId}', [ProgrammeController::class, 'getEtablissements']);
Route::resource('projet', ProjetController::class)->middleware('auth');
Route::post('/projet/enrg', [ProfileController::class, 'enrg'])->name('profile.enrg')->middleware('auth');
Route::get('/projects/export', [ProjetController::class, 'export'])->middleware('auth');
Route::resource('action_charter', ActionCharterController::class)->middleware('auth');
Route::get('/lang/{lang}', function ($lang) {
    if (in_array($lang, ['ar', 'fr'])) {
        Session::put('locale', $lang);
        App::setLocale($lang);
    }
    return back();
});
Route::post('/import-json', [ProjetController::class, 'importJson'])->name('projets.import.json');
Route::get('/delegations/{gouvernorat_id}', [ProjetController::class, 'getDelegations']);
Route::get('/etablissements/{programme_id}', [ProjetController::class, 'getEtablissements']);
Route::get('/names_etablissements/{gouvernorat_id}/{etablissement_id}', [ProjetController::class, 'getNamesEtablissements']);
Route::resource('etablissement_sous_supervision',EtablissementSousSupervisionController::class)->middleware('auth');
Route::get('etablissement_sous_supervision/action_charter/{action_charter}', [EtablissementSousSupervisionController::class, 'indexByCharter'])->name('etablissement_sous_supervision.indexByCharter')->middleware('auth');
Route::get( 'etablissement_sous_supervision/create/{action_charter}', [EtablissementSousSupervisionController::class, 'createByCharter'])->name('etablissement_sous_supervision.createByCharter')->middleware('auth');
Route::resource('etablissement_rh',EtablissementRhController::class)->middleware('auth');
Route::get('etablissement_rh/action_charter/{action_charter}', [EtablissementRhController::class, 'indexByCharter']) ->name('etablissement_rh.indexByCharter')->middleware('auth');
Route::get('etablissement_rh/create/{action_charter}', [EtablissementRhController::class, 'createByCharter'])->name('etablissement_rh.createByCharter')->middleware('auth');
Route::resource('loi', LoiController::class)->middleware('auth');
Route::resource('quatre_analyses', QuatreAnalysesController::class)->middleware('auth');
Route::get('quatre_analyses/action_charter/{action_charter}', [QuatreAnalysesController::class, 'indexByCharter']) ->name('quatre_analyses.indexByCharter')->middleware('auth');
Route::get('quatre_analyses/create/{action_charter}', [QuatreAnalysesController::class, 'createByCharter'])->name('quatre_analyses.createByCharter')->middleware('auth');
Route::put('quatre_analyses/update/last', [QuatreAnalysesController::class, 'updateLast'])->name('quatre_analyses.updateLast')->middleware('auth');

Route::resource('voiture_etablissement',VoitureEtablissementController::class)->middleware('auth');
Route::get('voiture_etablissement/action_charter/{action_charter}', [VoitureEtablissementController::class, 'indexByCharter']) ->name('voiture_etablissement.indexByCharter')->middleware('auth');
Route::get('voiture_etablissement/create/{action_charter}', [VoitureEtablissementController::class, 'createByCharter'])->name('voiture_etablissement.createByCharter')->middleware('auth');
Route::put('voiture_etablissement/update/last', [VoitureEtablissementController::class, 'updateLast'])->name('voiture_etablissement.updateLast')->middleware('auth');
