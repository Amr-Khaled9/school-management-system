<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileTeacherController extends Controller
{
   public function index()
   {

       $information =  auth('teacher')->user();
        return view('teachers.profile',compact('information'));
   }
//"Name_ar" => "عمرو خالد حماد"
//"password" => null
   public function update(Request $request ,$id)
   {
       $teacher =Teacher::where('id',$id)->first();

         if(!empty($request->password)){
             $teacher->name = $request->Name_ar;
             $passwordE= Hash::make($request->password);
             $teacher->password =  $passwordE;
             $teacher->save();
         }else{
             $teacher->name = $request->Name_ar;
             $teacher->save();

         }

       toastr()->success('تم تعديل البيانات الشخصية');
       return redirect()->back();

   }
}
