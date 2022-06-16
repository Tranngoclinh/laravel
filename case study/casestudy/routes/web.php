<?php

use App\Http\Controllers\admin\CategoriController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\auth\LoginController as AuthLoginController;
use App\Http\Controllers\website\HomeController;
use App\Http\Controllers\website\LoginController as WebsiteLoginController;
use App\Models\admin\CategoriModel;
use App\Models\admin\LoginModel;
use App\Models\Phone;
use App\Models\User;
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

// Route::get('/', function () {
// })->middleware('auth');
Route::get('/', [AuthLoginController::class, 'login'])->name('login');
Route::post('/', [AuthLoginController::class, 'adminlogin'])->name('adminlogin');

Route::get('/register', function () {
    return view('website.auth.register');
})->name('register');
Route::post('/register', [AuthLoginController::class, 'register'])->name('register');
Route::get('/logout', [AuthLoginController::class, 'logout'])->name('logout');


// Route::prefix()->group(function () {

// });
Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth:admin_login']
], function () {
    Route::get('/home', function () {
        return view('admin.index');
    })->name('home');

    Route::get('search', [CategoriController::class, 'search'])->name('categori.search');
    Route::get('trashedcategory', [CategoriController::class, 'trashed'])->name('categori.trashed');
    Route::get('/restore/{id}', [CategoriController::class, 'restore'])->name('categori.restore');
    Route::delete('/forceDelete/{id}', [CategoriController::class, 'forceDelete'])->name('categori.forceDelete');
    Route::resource('categori', CategoriController::class);

    Route::resource('product', ProductController::class);
    Route::get('search', [ProductController::class, 'search'])->name('product.search');
    Route::get('trashedproduct', [ProductController::class, 'trashed'])->name('product.trashed');
    // Route::post('displayproduct', [ProductController::class, 'index'])->name('product.index');
    Route::get('/restoreproduct/{id}', [ProductController::class, 'restore'])->name('product.restore');
    Route::delete('/forceDeleteproduct/{id}', [ProductController::class, 'forceDelete'])->name('product.forceDelete');

    Route::resource('customer', CustomerController::class);
    Route::get('search', [CustomerController::class, 'search'])->name('customer.search');
    Route::get('trashedcustomer', [CustomerController::class, 'trashed'])->name('customer.trashed');
    Route::get('/restorecustomer/{id}', [CustomerController::class, 'restore'])->name('customer.restore');
    Route::delete('/forceDeletecustomer/{id}', [CustomerController::class, 'forceDelete'])->name('customer.forceDelete');
});

Route::get('homeshop',function(){
    return view('website.index');    
})->name('homelogin');
Route::group([
    'prefix' => 'carshop',
    'middleware' => ['auth:admin_login']
], function () {
Route::resource('home',HomeController::class);
Route::get('detail/{id}',[HomeController::class,'detail'])->name('home.detail');
Route::get('cart',[HomeController::class,'getCart'])->name('home.getcart');
Route::get('addtocart/{id}',[HomeController::class,'addToCart'])->name('home.addtocart');
});
// Route::get('loginshop',[WebsiteLoginController::class,'login'])->name('loginshop');
// Route::get('registershop',[WebsiteLoginController::class,'register'])->name('registershop');
