<?php

use App\Http\Controllers\OeuvreController;
use App\Http\Controllers\VisiteurController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/home', function(){
    return view('auth.home');
})->middleware(['auth', 'verified'])->name('home');

Route::resource('oeuvre', OeuvreController::class);

Route::get('/info-visiteur', [VisiteurController::class, 'index'])->name('visiteur.info');//->middleware('auth'); CHANGER QUAND L'AUTH SERA FAIT
Route::post('/info-visiteur/upload', [VisiteurController::class, 'upload'])->name('visiteur.upload');
