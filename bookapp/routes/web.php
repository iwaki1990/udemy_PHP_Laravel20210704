<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BoardController;

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

Route::get('/', [BookController::class, 'index'])
->middleware(['auth'])->name('dashboard');
Route::get('/book', [BookController::class, 'add']);
Route::post('/book', [BookController::class, 'create']);
Route::get('/book/{book}', [BookController::class, 'find']);
Route::post('/book/{book}', [BookController::class, 'search']);
Route::delete('/book/{book}', [BookController::class, 'delete']);
Route::delete('/book/{book}', [BookController::class, 'remove']);
Route::get('/board', [BoardController::class, 'index']);//追記
Route::get('/board/add', [BoardController::class, 'add']);//追記
Route::post('/board/add', [BoardController::class, 'create']);//追記

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});