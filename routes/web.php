<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalystController;

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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/upload_file', [CatalystController::class, 'index'])->name('upload_file');
Route::post('/process', [CatalystController::class, 'process'])->name('process');
Route::get('/filter_form', [CatalystController::class, 'filter_form'])->name('filter_form');
Route::post('/filter', [CatalystController::class, 'filter'])->name('filter');
Route::get('/user', [CatalystController::class, 'users'])->name('user');
