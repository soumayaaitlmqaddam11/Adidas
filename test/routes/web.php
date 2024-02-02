<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('test');
});
Route::get('/category', [CategoryController::class,'liste_category']);
Route::post('/update/traitement', [CategoryController::class,'update_category_traitement']);
Route::get('/ajouter', [CategoryController::class,'ajouter_category']);
Route::get('/update-category/{id}', [CategoryController::class,'update_category']);
Route::get('/delete-category/{id}', [CategoryController::class,'delete_category']);
Route::post('/ajouter/traitement', [CategoryController::class,'ajouter_category_traitement']);

Route::get('/product', [ProductController::class,'liste_product']);
Route::post('/update/traitement', [ProductController::class,'update_product_traitement']);
Route::get('/ajouterproduit', [ProductController::class,'ajouter_product']);
Route::get('/update-product/{id}', [ProductController::class,'update_product']);
Route::get('/delete-product/{id}', [ProductController::class,'delete_product']);
Route::post('/ajouter/traitement', [ProductController::class,'ajouter_product_traitement']);



