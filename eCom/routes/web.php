<?php

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
use App\Http\Controllers\CatController;
use App\Http\Controllers\SubCatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});

Route::post('/insert', [CatController::class,'insert']);
Route::get('/create_cat', [CatController::class,'createCat']);
Route::get('/show', [CatController::class,'show']);
Route::get('/cat_edit/{id}', [CatController::class,'edit']);
Route::post('/update', [CatController::class,'update']);
Route::get('/delete/{id}', [CatController::class,'delete']);
// Subcat
Route::get('/show_subcat', [SubCatController::class,'showSubCat']);
Route::post('/insertSubCat', [SubCatController::class,'insert']);

// home
Route::get('/home', [HomeController::class,'home']);

Route::get('/product/cat_ajax/{id}', [ProductController::class,'cat_ajax']);
Route::get('/product/product_details',[ProductController::class,'details']);
Route::resource('/product',ProductController::class);


