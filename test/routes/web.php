<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('test');
// });
Route::get('/category', [CategoryController::class,'liste_category']);
Route::post('/update/traitementcategory', [CategoryController::class,'update_category_traitement']);
Route::get('/ajouterCategory', [CategoryController::class,'ajouter_category']);
Route::get('/update-category/{id}', [CategoryController::class,'update_category']);
Route::get('/delete-category/{id}', [CategoryController::class,'delete_category']);
Route::post('/ajouter/traitementCategory', [CategoryController::class,'ajouter_category_traitement']);

Route::get('/product', [ProductController::class,'liste_product']);
Route::post('/update/traitementproduct', [ProductController::class,'update_product_traitement']);
Route::get('/ajouterproduit', [ProductController::class,'ajouter_product']);
Route::get('/update-product/{id}', [ProductController::class,'update_product']);
Route::get('/delete-product/{id}', [ProductController::class,'delete_product']);
Route::post('/ajouter/traitementProduit', [ProductController::class,'ajouter_product_traitement']);
Route::get('/',[ProductController::class,'afficher']);

// //auth
// Route::get('/',function(){
//     return view('test');
// })->name('test');*

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'loginPost'])->name('login.post');
Route::get('/registration',[AuthController::class,'registration'])->name('registration');
Route::post('/registration',[AuthController::class,'registrationPost'])->name('registration.post');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/user', [UserController::class,'liste_user']);
Route::post('/update/traitement', [UserController::class,'update_user_traitement']);
Route::get('/ajouteruser', [UserController::class,'ajouter_user']);
Route::get('/update-user/{id}', [UserController::class,'update_user']);
Route::get('/delete-user/{id}', [UserController::class,'delete_user']);
Route::post('/ajouter/traitement', [UserController::class,'ajouter_user_traitement']);

Route::get('/role', [RoleController::class,'liste_role']);
Route::post('/update/traitement', [RoleController::class,'update_role_traitement']);
Route::get('/ajouter', [RoleController::class,'ajouter_role']);
Route::get('/update-role/{id}', [RoleController::class,'update_role']);
Route::get('/delete-role/{id}', [RoleController::class,'delete_role']);
Route::post('/ajouter/traitementRole', [RoleController::class,'ajouter_role_traitement']);



Route::get('/forget_password',[ForgotPasswordController::class,'forgetPassword'])->name("forget.password");
Route::post('/forget_password',[ForgotPasswordController::class,'forgetPasswordPost'])->name("forget.password.post");
Route::get('/reset_password/{token}',[ForgotPasswordController::class,'resetPassword']);
Route::post('/reset_password/{token}',[ForgotPasswordController::class,'resetPasswordPost']);

  