<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
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
    return view('auth.login');
});



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'admin'], function(){
    Route::view('/document', 'document');
    Route::get('/guru', [App\Http\Controllers\GuruController::class, 'index']);
    Route::post('/guru', [App\Http\Controllers\GuruController::class, 'store']);
    Route::get('/guru/create', [App\Http\Controllers\GuruController::class, 'create']);
});

Route::group(['middlware' => 'user'], function(){
    Route::get('/user', [UserController::class, 'index'])->name('user');
});