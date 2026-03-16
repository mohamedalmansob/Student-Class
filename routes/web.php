<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    return view('master');
});

Route::get('home',function(){
    return View('home');

});
