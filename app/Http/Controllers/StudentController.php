<?php

namespace App\Http\Controllers;

use App\Http\Requests\createstudentvalidationrequest;
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
    public function create(){
        $countries=countries::select('id','name')->where('active',1)->get();
        return View('Students.create',['countrise'=>$countries]);
    }
    public function store(createstudentvalidationrequest $request){
        $counter=Students::where('name','=',$request->name)->count();
        if($counter){
            // الرجوع للخلف مع الاحتفاظ بالقيم المدخلة والانتقال مع الرسالة
            return redirect()->back()->with(['error'=>'الاسم موجود بالفعل'])->withInput();
        }
        $student=new  Students();
        $student->name=$request->name;
        $student->country_id=$request->country_id;
        $student->nutionalID=$request->nutionalID;
        $student->phones=$request->phones;
        $student->address=$request->address;
        $student->notes=$request->notes;
        if($request->has('photo')){
            $image=$request->photo;
            $extension=strtolower($image->extension());
            $filename=time().rand(1,1000).'.'.$extension;
            $image->getClientOriginalName=$filename;
            $image->move('uploade',$filename);
            $student->image=$filename;
        }
        $student->active=$request->active;
        $student->save();
        return redirect()->route('Students.index')->with(['success'=>'تمت الاضافة بنجاح']);
    
    
        }
        public function edit($id){
            $data=Students::find($id);
            if(empty($data)){
                return redirect()->route('Students.index')->with(['error'=>'عفوا غير قادر للوصول للبيانات المطلوبة']);
    
            }
            $countries=countries::select('id','name')->where('active',1)->get();

            return View('Students.edit',['data'=>$data,'countrise'=>$countries]);
    
        }
        public function update($id ,createstudentvalidationrequest $request){
            $datastudent=Students::find($id);
            if(empty($datastudent)){
                return redirect()->route('Students.index')->with(['error'=>'عفوا غير قادر للوصول للبيانات المطلوبة']);
    
            }
            $datastudent['name']=$request->name;
            $datastudent['country_id']=$request->country_id;
            $datastudent['nutionalID']=$request->nutionalID;
            $datastudent['phones']=$request->phones;
            $datastudent['address']=$request->address;
            $datastudent['notes']=$request->notes;
         
            $datastudent['active']=$request->active;
            if($request->has('photo')){
                $image=$request->photo;
                $extension=strtolower($image->extension());
                $filename=time().rand(1,1000).'.'.$extension;
                $image->getClientOriginalName=$filename;
                $image->move('uploade',$filename);
                $datastudent->image=$filename;
            }
            $datastudent->save();
            return redirect()->route('Students.index')->with(['success'=>'تم التعديل بنجاح']);
    
        }
}
