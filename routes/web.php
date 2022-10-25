<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MuroController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MainController::class, 'index'])->name('root');
Route::get('room/{url}', [MainController::class, 'sala'])->name('main.sala');
Route::get('room/{url}/block/{id}', [MainController::class, 'muro'])->name('main.sala.muro');
Route::post('room/{url}/block/{id}', [MainController::class, 'muroStore'])->name('main.sala.muro.store');
Route::get('room/{url}/block/{id}/duck', [MainController::class, 'muroShow'])->name('main.sala.muro.show');


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');



Route::middleware('auth.usuario')->group( function () {
  Route::any('/sign_out', [AuthController::class, 'sign_out'])->name('auth.sign_out');

  // Route::get('/blank', function () {
  //   return view('blank');
  // });
  Route::get('/home', [HomeController::class, 'index'])->name('home.index');

  // Route::get('sala', [MainController::class, 'muro'])->name('main.sala.muro');

  Route::resource('sala',SalaController::class);
  Route::resource('muro',MuroController::class)->except(['create']);

  Route::get('sala/{id}/muro',[MuroController::class, 'create'])->name('sala.muro.create');


  // Route::resource('usuario',[UsuarioController::class]);
});



