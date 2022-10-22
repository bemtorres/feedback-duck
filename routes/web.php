<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MainController::class, 'index'])->name('root');


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');



Route::middleware('auth.usuario')->group( function () {
  Route::any('/sign_out', [AuthController::class, 'sign_out'])->name('auth.sign_out');

  // Route::get('/blank', function () {
  //   return view('blank');
  // });
  Route::get('/home', [HomeController::class, 'index'])->name('home.index');
});
