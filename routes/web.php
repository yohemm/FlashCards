<?php

use App\Http\Controllers\FlashCardController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
})->name('root');



Route::prefix('/card')->controller(FlashCardController::class)->group(function(){

    Route::get('/', 'index')-> name('card.index');

    Route::get('/{slug}-{id}', 'card')-> where([
        "id"=> '[0-9]+', 
        "slug"=> '[a-z0-9\-]+'
    ])->name('card.show');

    Route::get('/{slug}-{id}/play','play')-> where([
        "id"=> '[0-9]+', 
        "slug"=> '[a-z0-9\-]+'
    ])->name('card.play');

    Route::post('/new','store');
    Route::get('/new','create')->name('card.create');
    Route::get('/{card}/edit','edit')->name('card.edit')-> where([
        "card"=> '[0-9]+' ]);
    Route::patch('/{card}/edit','update')-> where([
        "card"=> '[0-9]+']);

})->name('card');
    


Route::prefix('/theme')->controller(ThemeController::class)->group(function(){

        Route::get('/', 'index')->name('theme.index');

})->name('theme');


Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/login', [AuthController::class,'connection']);
Route::delete('/logout', [AuthController::class,'logout'])->name('logout');

Route::prefix('/user')->controller(UserController::class)->group(function(){

    Route::get('/', 'single')->name('user.index');
    Route::get('/new', 'create')->name('user.create')->middleware('auth') ;
    Route::post('/new', 'store')->middleware('auth');
    Route::get('{user}/edit', 'edit')->where([
            'user'=>'[0-9]+'
    ])->name('user.edit');
    Route::patch('{user}/edit', 'update')->where([
            'user'=>'[0-9]+'
    ]);

    Route::get('/{name}-{id}', 'single')->where([
            "id"=>"[0-9]+",
            "name" => "[a-z0-9\-\_]+"
        ])->name('user.show');

})->name('user');
    
