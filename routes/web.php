<?php

use App\Http\Controllers\AbonnementController;
use App\Models\Role;
use App\Models\Proposal;
use App\Http\Livewire\Job;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProposalController;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\passwordEmailController;
use App\Http\Controllers\UpdateProfilController;
use App\Http\Middleware\CheckAccountValidity;
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

//  Route::get('/', function () {
//      return view('welcome');
// });

Route::get('/', [JobController::class, 'index'])->name('Clients.index');


Route::get('/Jobs', [JobController::class, 'index'])->name('Jobs.index');

Route::get('/Jobs/{id}', [JobController::class, 'show'])->name('Jobs.show');

Route::get('/prestataire', [ClientController::class, 'index'])->name('Jobs.prestataire');

Route::get('/prestataire/{id}', [ClientController::class, 'show'])->name('Jobs.prestataire.show');


Route::group(['middleware' => ['auth']], function () {
    //Route::get('/home', function () {return view('home');})->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::delete('/home/{id}', [HomeController::class, 'destroy'])->name('home.destroy');

    Route::get('/abonnement/{id}', [AbonnementController::class, 'show'])->middleware(CheckAccountValidity::class)->name('abonnement.show');

    Route::get('/abonnement1/{id}', [AbonnementController::class, 'abonnement'])->name('abonnement.abonnement');

    Route::get('/abonnement2/{id}', [AbonnementController::class, 'abonnement2'])->name('abonnement.abonnement2');

    Route::get('/abonnement3/{id}', [AbonnementController::class, 'abonnement3'])->name('abonnement.abonnement3');

    Route::get('/abonnement4/{id}', [AbonnementController::class, 'abonnement4'])->name('abonnement.abonnement4');



    Route::get('/ajouterjob', [AddController::class, 'create'])->name('Jobs.create');
    Route::post('/ajouterjob', [AddController::class, 'store'])->name('Jobs.store');

    Route::delete('/destroy/{id}', [AddController::class, 'destroy'])->name('Jobs.destroy');

    Route::get('/destroy2/{id}', [JobController::class, 'destroy'])->name('Jobs.destroy2');

    Route::get('/edit/{id}', [JobController::class, 'edit'])->name('Jobs.edit2');


    Route::put('/update/{id}', [JobController::class, 'update'])->name('Jobs.update2');


    Route::get('/destroyservice/{id}', [ClientController::class, 'destroy'])->name('client.destroyservice');

    Route::get('/editservice/{id}', [ClientController::class, 'edit'])->name('client.editservice');
    Route::put('/updateservice/{id}', [ClientController::class, 'update'])->name('client.updateservice');

    Route::post('/ajouterprestataire', [ClientController::class, 'store'])->name('prestataire.store');


    Route::get('/mesinformations/{id}/edit', [UpdateProfilController::class, 'edit'])->name('mesinformations.edit');
    Route::put('/mesinformations/{id}', [UpdateProfilController::class, 'update'])->name('mesinformations.update');

    Route::get('/confirmProposal/{proposal}', [ProposalController::class, 'confirm'])->name('confirm.proposal');

    Route::get('/conversations', [ConversationController::class, 'index'])->name('conversation.index');

    Route::get('/conversations/{conversation}', [ConversationController::class, 'show'])->name('conversation.show');
});


Route::group(['middleware' => ['auth', 'proposal']], function () {

    Route::post('/submit/{job}', [ProposalController::class, 'store'])->name('proposals.store');
});

Route::get('/forgot-password', [passwordEmailController::class, 'viewPasswordForgot'])->name('passwordforgot'); //formulaire email de mot de passe oublié

Route::get('/form', [passwordEmailController::class, 'formPasswordForgot']);//formulaire de mise à jour du mot de passe

Route::post('/forgot-password', [passwordEmailController::class, 'emailPassword'])->name('password.email'); //envoie du mail


Route::put('/forgot-password', [passwordEmailController::class, 'passwordForgot'])->name('password.update'); //mettre à jour le mot de passe
