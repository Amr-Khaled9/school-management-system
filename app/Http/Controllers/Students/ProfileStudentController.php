<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class ProfileStudentController extends Controller
{
    public function viewProfile (){
        $information =  auth('student')->user();
        return view('students.profile',compact('information'));
    }
    public function updateProfile(Request $request ,$id)
    {
        $teacher =Student::where('id',$id)->first();

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
