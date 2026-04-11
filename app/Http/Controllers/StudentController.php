<?php

namespace App\Http\Controllers;
use App\Models\countries;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $data=Students::all();
        if(!empty($data)){
            foreach($data as $info){
                $info->country_name=countries::where('id','=',$info->country_id)->value('name');
            }
        }
        return View('Students.index',['data'=>$data]);
    }
}
