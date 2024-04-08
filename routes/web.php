<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\homecontroller;
use  App\Http\Controllers\adminController;
use App\Http\Controllers\categoryController;

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

Route::get('/', [homecontroller::class, 'home']);
Route::get('/products-datils', [homecontroller::class, 'datilspage']);
Route::get('/products-shop', [homecontroller::class, 'products_shop']);
Route::get('/products-process', [homecontroller::class, 'return']);
Route::get('/products-viewall', [homecontroller::class, 'viewall']);
Route::get('/products-viewcart', [homecontroller::class, 'viewcart']);
Route::get('/products-checkout', [homecontroller::class, 'checkout']);
Route::get('/privace-police', [homecontroller::class, 'policy']);
Route::get('/ceatagory-product', [homecontroller::class, 'ceatagory']);
Route::get('/contactus', [homecontroller::class, 'contactus']);


//backend routes login....
Auth::routes();
Route::get('/admin/login', [adminController::class, 'login']);
Route::post('/admin/login-acess', [adminController::class, 'login_check']);
Route::get('/admin/Dashboard', [adminController::class, 'dashboard']);

//backend routes category....
Route::get('/admin/category/addNew',[categoryController::class,'CategoryAddNew']);
Route::post('/admin/category/store',[categoryController::class,'CategoryStore']);
Route::get('/admin/category/list',[categoryController::class,'Categorylist']);
Route::get('/admin/category/delete/{id}',[categoryController::class,'categoryDelete']);
Route::get('/admin/category/edit/{id}',[categoryController::class,'categoryedit']);
Route::post('/admin/category/update/{id}',[categoryController::class,'categoryupdate']);

Route::get('/admin/sub-category/addNew',[categoryController::class,'subCategoryAddNew']);
Route::post('/admin/sub-category/store',[categoryController::class,'subCategoryStore']);
Route::get('/admin/sub-category/list',[categoryController::class,'subCategorylist']);
Route::get('/admin/sub-category/delete/{id}',[categoryController::class,'subcategoryDelete']);
Route::get('/admin/sub-category/edit/{id}',[categoryController::class,'subcategoryedit']);
Route::post('/admin/sub-category/update/{id}',[categoryController::class,'subcategoryupdate']);