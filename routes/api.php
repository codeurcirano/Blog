<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\BienController;
use Illuminate\Support\Facades\Route;

Route::get('biens', [BienController::class, 'index']);

Route::post('auth/register', [AuthController::class, 'register']);


Route::get('/biens/{bien}/annonces' ,[BienController::class, 'annonces']);

Route::get('/biens/{bien}/annonces', [BienController::class, 'annonces']);

Route::get('/biens/{bien}/demandes', 'BienController@demandes');

Route::apiResource('/annonces', 'AnnonceController');

Route::get('/annonces/{annonce}/bien', 'AnnonceController@bien');

Route::get('/annonces/{annonce}/demandes', 'AnnonceController@demandes');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// **Table : Demande**

Route::apiResource('/demandes', 'DemandeController');

Route::get('/demandes/{demande}/annonce', 'DemandeController@annonce');

Route::get('/demandes/{demande}/user', 'DemandeController@user');

// **Table : Message**

Route::apiResource('/messages', 'MessageController');

Route::get('/messages/{message}/expediteur', 'MessageController@expediteur');

Route::get('/messages/{message}/destinataire', 'MessageController@destinataire');

Route::get('/messages/{message}/annonce', 'MessageController@annonce');

// **Table : TypeDeBien**

Route::apiResource('/type_de_biens', 'TypeDeBienController');

// **Table : User**

Route::apiResource('/users', 'UserController');

Route::get('/users/{user}/annonces', 'UserController@annonces');

Route::get('/users/{user}/demandes', 'UserController@demandes');

Route::get('/users/{user}/messages', 'UserController@messages');

// **Table : Bien**
