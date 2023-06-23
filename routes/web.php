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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::prefix('admin')->name('admin.')->group(callback: function (){
    Route::resource('technique', \App\Http\Controllers\Admin\TechniqueController::class);
    Route::resource('poomse', \App\Http\Controllers\Admin\PoomseController::class);
});
