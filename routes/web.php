<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::middleware ('auth') -> group (function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/', [AnimalController::class, 'index']);

    Route::get('/animal/{animal}', [AnimalController::class, 'show']);
    Route::delete('/animal/{animal}/', [AnimalController::class, 'destroy']);

    Route::get('/animal/', [AnimalController::class, 'create']);
    Route::post('/animal/', [AnimalController::class, 'store']);

    Route::get('/animal/{animal}/edit', [AnimalController::class, 'edit']);
    Route::patch('/animal/{animal}', [AnimalController::class, 'update']);

});
