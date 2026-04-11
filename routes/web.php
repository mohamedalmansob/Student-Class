<?php

use App\Http\Controllers\CorsesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', [HomeController::class,'index'])->name('home');

//courses
Route::get('Corses',[CorsesController::class,'index'])->name('Corses.index');
Route::get('Create_Corses',[CorsesController::class,'create'])->name('Corses.Create');
Route::post('Store_Corses',[CorsesController::class,'store'])->name('Corses.store');
Route::get('Edit_Corses/{id}',[CorsesController::class,'edit'])->name('Corses.edit');
Route::get('Corses',[CorsesController::class,'index'])->name('Corses.index');
Route::post('‘Update_Corses/{id}',[CorsesController::class,'update'])->name('Corses.update');
Route::get('Delete_Corses/{id}',[CorsesController::class,'delete'])->name('Corses.delete');

//Students
Route::get('Students',[StudentController::class,'index'])->name('Students.index');
Route::get('Create_Students',[StudentController::class,'create'])->name('Students.Create');
Route::post('Store_Students',[StudentController::class,'store'])->name('Students.store');
Route::get('Edit_Students/{id}',[StudentController::class,'edit'])->name('Students.edit');
Route::get('Students',[StudentController::class,'index'])->name('Students.index');
Route::post('‘Update_Students/{id}',[StudentController::class,'update'])->name('Students.update');
Route::get('Delete_Students/{id}',[StudentController::class,'delete'])->name('Students.delete');