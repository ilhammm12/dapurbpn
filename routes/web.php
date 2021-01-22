<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\maUserController;
use App\Http\Controllers\maTokoController;
use App\Http\Controllers\maMenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
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

Route::get('/auth', function () {
    return view('welcome');
});

Route::get('/',[PageController::class, 'index'])->name('front.homepage');
Route::get('/show/{id}',[PageController::class, 'show'])->name('front.show');
Route::get('/masuk',[PageController::class, 'masuk'])->name('front.masuk');
Route::get('/keluar',[PageController::class, 'keluar'])->name('front.keluar');
Route::get('/daftar',[PageController::class, 'daftar'])->name('front.daftar');
Route::post('/storeUser',[PageController::class, 'storeUser'])->name('front.storeUser');
Route::get('/transaksi/{id}',[PageController::class, 'transaksi'])->name('front.transaksi');
Route::post('/storeTransaksi',[PageController::class, 'storeTransaksi'])->name('front.storeTransaksi');

Route::post('/validateLogin',[PageController::class, 'validateLogin'])->name('front.validateLogin');


Route::get('/profile/{id}',[PageController::class, 'profile'])->name('front.profile');

Route::get('/buatToko/{id}',[PageController::class, 'buatToko'])->name('front.buatToko');
Route::post('/storeToko/{id}',[PageController::class, 'storeToko'])->name('front.storeToko');

Route::get('/buatMenu/{id}',[PageController::class, 'buatMenu'])->name('front.buatMenu');
Route::post('/storeMenu/{id}',[PageController::class, 'storeMenu'])->name('front.storeMenu');



Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('maUsers', maUserController::class);

Route::get('maTransaksis', [App\Http\Controllers\maTransaksiController::class, 'index'])->name('maTransaksis.index');


Route::get('maTokos/create/{id}', [maTokoController::class,'create'])->name('maTokos.create');
Route::get('maTokos',[maTokoController::class, 'index'])->name('maTokos.index');
Route::post('maTokos/store/{id}',[maTokoController::class, 'store'])->name('maTokos.store');
Route::delete('maTokos/destroy/{id}',[maTokoController::class, 'destroy'])->name('maTokos.destroy');
Route::post('maTokos/edit/{id}',[maTokoController::class, 'edit'])->name('maTokos.edit');
Route::get('maTokos/show/{id}',[maTokoController::class, 'show'])->name('maTokos.show');


Route::get('maMenus/create/{id}', [maMenuController::class,'create'])->name('maMenus.create');
Route::post('maMenus/store/{id}',[maMenuController::class, 'store'])->name('maMenus.store');
Route::delete('maMenus/destroy/{id}',[maMenuController::class, 'destroy'])->name('maMenus.destroy');
