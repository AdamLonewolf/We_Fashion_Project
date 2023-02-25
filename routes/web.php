<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeProductController;
use App\Http\Controllers\ProductController;

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


// Routes pour l'Authentification

Route::get('/login',[AuthController::class,"login"])->name('login');
Route::post('/login',[AuthController::class,"authenticate"])->name('authenticate');
Route::post('/logout',[AuthController::class,"logout"])->name('logout');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

//Routes pour la Page client

Route::post('/register',[AuthController::class,"register"])->name('register');
Route::get('/', [HomeProductController::class, 'customer'])->name('home');
Route::get('/solde', [HomeProductController::class, 'state'])->name('state');
Route::get('/categorie/{id}', [HomeProductController::class, 'categorySort'])->name('categorie');
Route::get('/show/{id}', [HomeProductController::class, 'show'])->name('show');


//Routes pour la page Admin

Route::get('/admin',[ProductController::class,"index"])->name('dashboard');
Route::get('/admin/new_product',[ProductController::class,"create"])->name('new_product');
Route::post('/admin/store_product',[ProductController::class,"store"])->name('store_product');
Route::get('/admin/edit/{id}',[ProductController::class,"edit"])->name('edit_product');
Route::post('/admin/update_product',[ProductController::class,"update"])->name('update_product'); 
Route::post('/admin/destroy',[ProductController::class,"destroy"])->name('destroy_product');