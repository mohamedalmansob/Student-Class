<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corses;
use Illuminate\View\View;

class CorsesController extends Controller
{
    public function index(){
        $data=Corses::all();
        return View('Corses.index',['data'=>$data]);
    }
}
