<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\commodityController;
use App\Http\Controllers\QuestionController;
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

// 商品功能相關
Route::get('/Commodity/{searchname}',[commodityController::class, 'Commodity']);
Route::get('/Commodity',[commodityController::class, 'Commodity']);
Route::get('/create',[commodityController::class, 'create']);
Route::get('/Upload',[commodityController::class, 'Upload'])->name('senddata');
Route::get('/search',[commodityController::class, 'search']);
Route::get('/buy',[commodityController::class, 'buy']);
Route::delete('/del/{id}',[commodityController::class, 'deletedata'])->name('deldata');

// 問題功能相關
Route::get('/UploadQ',[QuestionController::class, 'Upload'])->name('sendQ');
Route::get('/searchQ',[QuestionController::class, 'search']);
Route::get('/Question/{searchname}',[commodityController::class, 'Question']);
Route::get('/Question',[QuestionController::class, 'Question']);
Route::get('/createQ',[QuestionController::class, 'create']);
Route::delete('/delQ/{id}',[QuestionController::class, 'deleteQ'])->name('delQ');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
