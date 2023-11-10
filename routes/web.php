<?php

use App\Http\Controllers\FlashCardController;
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
});


Route::prefix('/card')->group(function(){

    Route::get('/', [FlashCardController::class, 'index'])-> name('index');

    Route::get('/{slug}-{id}', [FlashCardController::class, 'cardFront'])-> where([
        "id"=> '[0-9]+', 
        "slug"=> '[a-z0-9\-]+'
    ])->name('front');

    Route::get('/{slug}-{id}/back',[FlashCardController::class, 'cardBack'])-> where([
        "id"=> '[0-9]+', 
        "slug"=> '[a-z0-9\-]+'
    ])->name('back');

})->name('card');
    
Route::get('/theme', function (Request $request) {
    return 'theme';
})->name('theme.index');

Route::get('/user', function (Request $request) {
    return 'user';
})->name('user.index');

