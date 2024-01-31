<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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
Route::get('/product', function () {
    return view('product');
});
Route::get('/category', [CategoryController::class,'liste_category']);
Route::get('/ajouter', [CategoryController::class,'ajouter_category']);
Route::post('/ajouter/traitement', [CategoryController::class,'ajouter_category_traitement']);



