<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\IndexController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\HomeController;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Mockery\Matcher\Type;
use PHPUnit\Event\TypeMap;

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
// Route::get('/categories/edit', function () {
//     return view('dashboard.categories.edit');
// });


Route::get('/',[IndexController::class,'index'] )->name('admin');
Route::get('/index',[IndexController::class,'index'] )->name('admin');
Route::group(['as'=>'dashboard.'],function(){

    Route::get('/setting/index',[SettingController::class,'index'] )->name('settings.index');
    Route::put('/setting/{setting}/update',[SettingController::class,'update'] )->name('settings.update');

    // category routes
    Route::delete('/categories/delete/{id}',[CategoryController::class,'delete'] )->name('categories.delete');
    Route::resource('categories', CategoryController::class);

    // product route
    Route::resource('products',ProductController::class)->except('show');
});



Route::get('/tracking/show',function( Type $var=null){
    return view('traking');
})->name('tracking.show');
Route::get('tracking/',function(){
    $data=[
        [30.0449,31.2353],
        [30.0566,31.2348],
        [30.0477,31.2333],
        [30.0455,31.2322],
    ];
    return response()->json($data);
})->name('tracking');
