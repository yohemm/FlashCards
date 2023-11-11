<?php

use App\Http\Controllers\FlashCardController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\UserController;
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

    Route::get('/', 'index')-> name('index');

    Route::get('/{slug}-{id}', 'cardFront')-> where([
        "id"=> '[0-9]+', 
        "slug"=> '[a-z0-9\-]+'
    ])->name('front');

    Route::get('/{slug}-{id}/back','cardBack')-> where([
        "id"=> '[0-9]+', 
        "slug"=> '[a-z0-9\-]+'
    ])->name('back');

})->name('card');
    


Route::prefix('/theme')->controller(ThemeController::class)->group(function(){

        Route::get('/', 'index')->name('index');

})->name('theme');



Route::prefix('/user')->controller(UserController::class)->group(function(){

    Route::get('/', 'userPage')->name('index');

    Route::get('/{name}-{id}', 'userPage')->where([
            "id"=>"[0-9]+",
            "name" => "[a-z0-9\-\_]+"
        ])->name('index');

})->name('user');
    
