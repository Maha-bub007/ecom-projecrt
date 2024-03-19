<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\homecontroller;

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

Route::get('/',[homecontroller::class,'home']);
Route::get('/products-datils',[homecontroller::class,'datilspage']);
Route::get('/products-shop',[homecontroller::class,'products_shop']);
Route::get('/products-process',[homecontroller::class,'return']);
Route::get('/products-viewall',[homecontroller::class,'viewall']);
Route::get('/products-viewcart',[homecontroller::class,'viewcart']);
Route::get('/products-checkout',[homecontroller::class,'checkout']);
Route::get('/privace-police',[homecontroller::class,'policy']);
Route::get('/ceatagory-product',[homecontroller::class,'ceatagory']);
Route::get('/contactus',[homecontroller::class,'contactus']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
