<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeProductController;

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

//Mes routes


//Authentification

Route::get('/login',[AuthController::class,"login"])->name('login');
Route::post('/login',[AuthController::class,"authenticate"])->name('authenticate');
Route::post('/logout',[AuthController::class,"logout"])->name('logout');
Route::get('/admin',[DashboardController::class,"index"])->name('dashboard')->middleware('auth');

//Page client

Route::post('/register',[AuthController::class,"register"])->name('register');
Route::get('/', [HomeProductController::class, 'all'])->name('home');
Route::get('/en_solde', [HomeProductController::class, 'state'])->name('state');
Route::get('/categorie/{id}', [HomeProductController::class, 'sortByCategorie'])->name('categorie');
Route::get('/show/{id}', [HomeProductController::class, 'show'])->name('show');



Route::get('/register', function () {
    return view('auth.register');
})->name('register');//Cette route retourne la vue de la page d'inscription

Route::get('/new', function () {
    return view('admin.new_product');
})->name('new');

//Routes temporaires (pour juste regarder les vues)


Route::get('/product', function () {
    return view('product');
});

Route::get('/modify', function () {
    return view('admin.modify_product');
})->name('modify');