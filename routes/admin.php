<?php

use App\Http\Controllers\Dashboard\IndexController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
// Route::get('/gg', function () {
//     return ('dashboard.index');
// });


Route::get('/index',[IndexController::class,'index'] )->name('admin');
Route::get('/setting/index',[SettingController::class,'index'] )->name('dashboard.settings.index');
Route::put('/setting/{setting}/update',[SettingController::class,'update'] )->name('dashboard.settings.update');


