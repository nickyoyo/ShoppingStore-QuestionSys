<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\indexController;
use Intervention\Image\Facades\Image;

// usage inside a laravel route

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
    return view('welcome');
});

Route::get('/index', [PizzaController::class, 'index']);
//Route::get('/index',[PizzaController::class, 'store']);
Route::get('/show',[PizzaController::class, 'show']);
Route::delete('/del/{id}',[PizzaController::class, 'destroy']);

Route::get('/Medicine',[indexController::class, 'Medicine']);


Route::get('/Camp',[indexController::class, 'Camp']);
Route::get('/Book/{searchname}',[indexController::class, 'Book']);
Route::get('/Book',[indexController::class, 'Book']);
Route::get('/create',[indexController::class, 'create']);
Route::get('/Upload',[indexController::class, 'Upload'])->name('senddata');
Route::get('/search',[indexController::class, 'search']);
Route::get('/buy',[indexController::class, 'buy']);
Route::delete('/del/{id}',[indexController::class, 'deletedata'])->name('deldata');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
