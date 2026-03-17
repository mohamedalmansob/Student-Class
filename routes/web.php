<?php

use App\Http\Controllers\CorsesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', [HomeController::class,'index'])->name('home');


Route::get('Corses',[CorsesController::class,'index'])->name('Corses.index');
Route::get('Create_Corses',[CorsesController::class,'create'])->name('Corses.Create');
Route::post('Store_Corses',[CorsesController::class,'store'])->name('Corses.store');
Route::get('Edit_Corses',[CorsesController::class,'edit'])->name('Corses.edit');
Route::get('Corses',[CorsesController::class,'index'])->name('Corses.index');
