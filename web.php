<?php

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

Route::get('task/index',[HomeController::class,'index'])->name('task.index');
Route::post('task/store',[HomeController::class,'store'])->name('task.store');
Route::put('task/{id}/update',[HomeController::class,'update'])->name('task.update');
Route::any('task/{id}/delete',[HomeController::class,'delete'])->name('task.delete');
