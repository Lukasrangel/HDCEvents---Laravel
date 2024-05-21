<?php

use Illuminate\Support\Facades\Route;

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

use \App\Http\Controllers\EventController;
use \App\Http\Controllers\loginController;
use \App\Http\Controllers\UserController;

Route::get('/', [EventController::class, 'index']); 
Route::get('/criar-evento', [EventController::class, 'criarEvento'])->middleware('auth');
Route::post('/events', [EventController::class, 'store']);
Route::get('/events/{id}', [EventController::class, 'eventSingle']);
Route::get('/login', [EventController::class, 'entrarPage'])->name('login');
Route::get('/cadastrar', [EventController::class, 'cadastrar']);
Route::get('/logout', [loginController::class, 'logout']);
Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');
Route::delete('/events/delete/{id}', [EventController::class, 'destroy'])->middleware('auth');
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->middleware('auth');
Route::put('/events/edit/{id}', [EventController::class, 'update'])->middleware('auth');
Route::delete('/events/left/{id}', [EventController::class, 'left'])->middleware('auth');


/* Login post */ 
Route::post('/entrar', [loginController::class, 'auth']);
Route::post('/cadastrar', [UserController::class, 'store']);
Route::post('/events/join/{id}', [EventController::class, 'eventJoin'])->middleware('auth');
