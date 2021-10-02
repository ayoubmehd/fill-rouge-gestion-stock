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

// Route::get('/admin/{any?}', function () {
//     return view('admin');
// })->where("any", "[\/\w\.-]*");

Route::name('admin.')->prefix('admin')->group(function () {

    Route::get('/', function () {
        return '';
    })->name('index');

    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::resource('orders', App\Http\Controllers\Admin\UserController::class);
    Route::resource('produits', App\Http\Controllers\Admin\ProduitController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategorieController::class);
});

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');