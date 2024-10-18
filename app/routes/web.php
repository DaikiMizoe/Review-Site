<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/',[DisplayController::class,'index']);
Route::resource('/shops','AppController');
Auth::routes();
Route::group(['middleware'=>'auth'],function(){
    Route::resource('/reviews','ReviewController');
    Route::resource('/users','UserController');
    Route::resource('/reports','ReportController');
});

Route::group(['middleware'=>'auth'],function(){
    Route::get('/admin',[AdminController::class,'index']);
    Route::get('/admin_hide/{id}',[AdminController::class,'HideReview'])->name('hide.review');
    Route::get('/admin_del/{id}',[AdminController::class,'UserDelete'])->name('del.user');
});