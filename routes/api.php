<?php

use App\Http\Controllers\API\CardController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Creation de cartes (connecté)
Route::put('/card/new/{question}/{answer}/{explication}',  [CardController::class, 'store'])->middleware('auth:sanctum');
Route::patch('/card/{card}/update/{question}/{answer}/{explication}',  [CardController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/card/{card}/delete',  [CardController::class, 'delete'])->middleware('auth:sanctum');

// Connexion
// Route::post('/login', [AuthController::class, 'login']);

// // Inscription
// Route::post('/register', [AuthController::class, 'store']);

// Liste de toutes les cartes
Route::get('/card', [CardController::class, 'all']);
Route::get('/card/{card}', [CardController::class, 'single']);

// Recherche de cartes
Route::get('/card/search/{research}', [CardController::class, 'search']);
    
// Cartes d'un joueur
Route::get('/card/user/{user}', [UserController::class, 'cardOfPlayer'])->middleware('auth:sanctum');
// Les joueurs qui utilisent la carte
Route::get('/card/{card}/players', [CardController::class, 'playersHasCard']);


Route::get('/user/{user}', [UserController::class, 'single'])->middleware('auth:sanctum');
Route::put('/user/new/{name}/{email}', [UserController::class, 'store'])->middleware('auth:sanctum');
Route::patch('/user/{user}/update/{name}/{email}', [UserController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/user/{user}/delete', [UserController::class, 'delete'])->middleware('auth:sanctum');
Route::get('/user', [UserController::class, 'all']);


?>