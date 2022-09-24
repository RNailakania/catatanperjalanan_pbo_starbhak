<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CatatanperjalananController;

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
    return view('dashboard');
});
Route::get('catatanperjalanan',[CatatanperjalananController::class, 'index'])->name('catatanperjalanan')->middleware('auth');
Route::get('create',[CatatanperjalananController::class, 'create'])->name('create');
Route::post('save',[CatatanperjalananController::class, 'store'])->name('simpan');


Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/loginproses',[LoginController::class, 'loginproses'])->name('loginproses');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');