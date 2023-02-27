<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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


// Routes pour l'Authentification

Route::get('/login',[AuthController::class,"login"])->name('login');
Route::post('/login',[AuthController::class,"authenticate"])->name('authenticate');
Route::post('/logout',[AuthController::class,"logout"])->name('logout');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

//Routes pour la Page client

Route::post('/register',[AuthController::class,"register"])->name('register_user');
Route::get('/', [HomeProductController::class, 'customer'])->name('home');
Route::get('/solde', [HomeProductController::class, 'state'])->name('state');
Route::get('/categorie/{id}', [HomeProductController::class, 'categorySort'])->name('categorie');
Route::get('/show/{id}', [HomeProductController::class, 'show'])->name('show');


//Routes pour la page Admin (CRUD Produits)

Route::get('/admin',[ProductController::class,"index"])->name('dashboard');
Route::get('/admin/new_product',[ProductController::class,"create"])->name('new_product');
Route::post('/admin/store_product',[ProductController::class,"store"])->name('store_product');
Route::get('/admin/edit/{id}',[ProductController::class,"edit"])->name('edit_product');
Route::post('/admin/update_product',[ProductController::class,"update"])->name('update_product'); 
Route::post('/admin/destroy_product',[ProductController::class,"destroy"])->name('destroy_product');


//Routes pour la page Admin (CRUD Catégories)

Route::get('/admin/categories',[CategoryController::class,"index"])->name('dashboard_category');
Route::get('/admin/new_category',[CategoryController::class,"create"])->name('new_category');
Route::post('/admin/new_category',[CategoryController::class,"store"])->name('store_category');
Route::get('/admin/edit_category/{id}',[CategoryController::class,"edit"])->name('edit_category');
Route::post('/admin/update_category',[CategoryController::class,"update"])->name('update_category'); 
Route::post('/admin/destroy_category',[CategoryController::class,"destroy"])->name('destroy_category');


//Routes pour le panier 

//Ici l'utilisateur doit être forcément connecté pour pouvoir consulter ces pages
Route::middleware('auth')->group(function () {
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('addCart');
Route::get('/cart/show', [CartController::class, 'ShowCart'])->name('cart');
});
Route::post('/cart/delete', [CartController::class, 'deleteCart'])->name('deleteCart');
