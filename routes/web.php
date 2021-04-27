<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminRegisterController;
use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\Admin\AdminProdController;
use App\Http\Controllers\Admin\AdminProdEditController;
use App\Http\Controllers\Admin\AdminProdDisplayController;
use App\Http\Controllers\Admin\AdminLogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;

use App\Models\Product;
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
    return view('layouts.app');
})->name('home');

Route::get('/admin',[AdminController::class,'index'])->name('admin');
Route::post('/admin',[AdminController::class,'store'])->name('admin');

Route::get('/admin/home',[AdminPagesController::class,'index'])->name('adminhome');

Route::post('/admin/logout',[AdminLogoutController::class,'index'])->name('adminlogout');

Route::get('/admin/products/add',[AdminProdController::class,'index'])->name('adminProducts');
Route::post('/admin/products/add',[AdminProdController::class,'store']);

Route::get('/admin/products/all',[AdminProdDisplayController::class,'index'])->name('adminProducts.show');

Route::get('/admin/product/edit',[AdminProdEditController::class,'index'])->name('adminProducts.edit');
Route::post('/admin/product/edit',[AdminProdEditController::class,'update']);
Route::delete('/admin/product/edit',[AdminProdEditController::class,'destroy']);


Route::get('/register',[RegisterController::class,'index'])->name('register');
// Route::get('/register','RegisterController@index')->name('register'); #alternate method
Route::post('/register',[RegisterController::class,'store'])->name('register');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);

Route::post('/logout',[LogoutController::class,'index'])->name('logout');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::get('/product/{product:id}',[ProductDetailController::class,'index'])->name('prod.detail');

Route::post('/cart',[CartController::class,'store'])->name('addcart');
Route::delete('/cart',[CartController::class,'destroy']);

Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
Route::post('/checkout',[CheckoutController::class,'store']);

Route::get('/orders',[OrderController::class,'index'])->name('orders');