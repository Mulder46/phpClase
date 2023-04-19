<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('agregarAutor',[AuthorController::class, 'store']);
Route::get('mostrarAutores',[AuthorController::class, 'index']);
Route::get('mostrarAutor/{id}',[AuthorController::class, 'show']); //el {id} se le pasa el parámetro id por la URL
Route::put('modificarAutor/{id}',[AuthorController::class, 'update']);
Route::delete('borrarAutor/{id}',[AuthorController::class, 'destroy']);
