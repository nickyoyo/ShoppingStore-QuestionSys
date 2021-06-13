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

//註冊登入登出相關
Auth::routes();
//登入註冊後跳頁
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 商品功能相關

//顯示個人商品、搜尋個人商品

Route::get('/Commodity/personal/{account}',[commodityController::class, 'showAccountProduct']);
Route::get('/Commodity/personal',[commodityController::class, 'searchAccountProduct']);
//顯示要修改商品、修改商品上傳
Route::post('/showC/{id}',[commodityController::class, 'showC'])->name('showC');
Route::get('/changeC/{id}',[commodityController::class, 'changeC'])->name('changeC');
//顯示所有商品
Route::get('/Commodity',[commodityController::class, 'Commodity']);
//新增商品、上船商品
Route::get('/create',[commodityController::class, 'create']);
Route::get('/Upload',[commodityController::class, 'Upload'])->name('senddata');
//搜尋商品
Route::get('/search',[commodityController::class, 'search']);
//刪除商品
Route::delete('/del/{id}',[commodityController::class, 'deleteC'])->name('delC');

Route::get('/buy',[commodityController::class, 'buy']);


// 問題功能相關

//顯示要修改問題、修改問題上傳
Route::post('/showQ/{id}',[QuestionController::class, 'showQ'])->name('showQ');
Route::get('/changeQ/{id}',[QuestionController::class, 'changeQ'])->name('changeQ');
//顯示所有問題、顯示搜尋問題
Route::get('/searchQ',[QuestionController::class, 'search']);
Route::get('/Question',[QuestionController::class, 'Question']);
//新增問題、上傳資料
Route::get('/createQ',[QuestionController::class, 'create']);
Route::get('/UploadQ',[QuestionController::class, 'Upload'])->name('sendQ');
//刪除問題
Route::delete('/delQ/{id}',[QuestionController::class, 'deleteQ'])->name('delQ');


