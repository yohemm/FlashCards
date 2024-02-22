<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CardController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 
Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);
 
    return ['token' => $token->plainTextToken];
});


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
Route::post('/card/new',  [CardController::class, 'store']);
Route::post('/card/{card}/update',  [CardController::class, 'update']);
Route::delete('/card/{card}/delete',  [CardController::class, 'destroy']);


Route::post('/login', [AuthController::class,'connection'])->name('api-login');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');

// Liste de toutes les cartes
Route::get('/card', [CardController::class, 'all']);
Route::get('/card/{card}', [CardController::class, 'show']);

// Recherche de cartes
Route::get('/card/search/{research}', [CardController::class, 'search']);
    
// Cartes d'un joueur
Route::get('/card/user/{user}', [CardController::class, 'cardOfPlayer']);
// Les joueurs qui utilisent la carte
Route::get('/card/{card}/players', [UserController::class, 'playersHasCard']);


Route::get('/user/{user}', [UserController::class, 'show']);
Route::put('/user/new/', [UserController::class, 'store']);
Route::middleware('auth:sanctum')->patch('/user/{user}/update', [UserController::class, 'update']);

Route::middleware('auth:sanctum')->delete('/user/{user}/delete', [UserController::class, 'destroy']);
Route::get('/user', [UserController::class, 'all']);


?>