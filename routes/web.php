<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DoLoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DoRegisterController;
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

Route::get('',HomeController::class)->name('home');
Route::get('login',LoginController::class)->name('login')->middleware('guest');
Route::post('login',DoLoginController::class)->name('do-login')->middleware('guest');
Route::get('logout',LogoutController::class)->name('logout')->middleware('auth');
Route::get('register',RegisterController::class)->name('register')->middleware('guest');
Route::post('register',DoRegisterController::class)->name('do-register')->middleware('guest');

Route::name('link.')->prefix('link')->namespace('App\Http\Controllers\Link')
      ->group(function (){
          Route::get('create','CreateController')->name('create');
      });
