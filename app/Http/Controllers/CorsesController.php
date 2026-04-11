<?php

namespace App\Http\Controllers;

use App\Http\Requests\createcoursevalidationrequest;
use Illuminate\Http\Request;
use App\Models\Corses;
use App\Models\countries;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class CorsesController extends Controller
{
    public function index(){
        $data=Corses::all();
        return View('Corses.index',['data'=>$data]);
    }
    public function create(){
        return View('Corses.create');
    }

    public function store(createcoursevalidationrequest $request){
    $counter=Corses::where('name','=',$request->name)->count();
    if($counter){
        // الرجوع للخلف مع الاحتفاظ بالقيم المدخلة والانتقال مع الرسالة
        return redirect()->back()->with(['error'=>'الاسم موجود بالفعل'])->withInput();
    }
    $course=new  Corses();
    $course->name=$request->name;
    $course->active=$request->active;
    $course->save();
    return redirect()->route('Corses.index')->with(['success'=>'تمت الاضافة بنجاح']);


    }
    public function edit($id){
        $data=Corses::find($id);
        if(empty($data)){
            return redirect()->route('Corses.index')->with(['error'=>'عفوا غير قادر للوصول للبيانات المطلوبة']);

        }
        return View('Corses.edit',['data'=>$data]);

    }
    public function update($id ,createcoursevalidationrequest $request){
        $dataCourse=Corses::find($id);
        if(empty($dataCourse)){
            return redirect()->route('Corses.index')->with(['error'=>'عفوا غير قادر للوصول للبيانات المطلوبة']);

        }
        $dataCourse['name']=$request->name;
        $dataCourse['active']=$request->active;
        $dataCourse['name']=$request->name;
        $dataCourse->save();
        return redirect()->route('Corses.index')->with(['success'=>'تم التعديل بنجاح']);

    }
    public function delete($id){
        $dataCourse=Corses::find($id);
        if(empty($dataCourse)){
            return redirect()->route('Corses.index')->with(['error'=>'عفوا غير قادر للوصول للبيانات المطلوبة']);

        }
        $dataCourse->delete();
        return redirect()->route('Corses.index')->with(['success'=>'تم الحذف بنجاح']);

    }
}
