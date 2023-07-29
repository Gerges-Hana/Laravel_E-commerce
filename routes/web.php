<?php

use App\Http\Controllers\StripeController;
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

Route::get('/', function () {
    return view('dashboard.index');
})->name('index');
Route::get('/categories/edit', function () {
    return view('dashboard.categories.edit');
});
// =======================Nafizly===============================================
Route::get('nafezly', function () {
    return ('paypal.nafezly');
    // return view('paypal.nafezly');
})->name('nafezly');

// =======================Nafizly===============================================

// +++++++++++++++++ checkout +++++++++++++++++++++++
Route::get('/checkout',[StripeController::class,'checkout'])->name('checkout');
Route::post('/session',[StripeController::class,'session'])->name('session');
Route::get('/success',[StripeController::class,'success'])->name('success');
// +++++++++++++++++ checkout +++++++++++++++++++++++

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Auth::routes();


