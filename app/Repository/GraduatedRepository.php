<?php

namespace App\Repository;

use App\Models\Student;

class GraduatedRepository implements GraduatedRepositoryInterface
{
    public function index(){

    }
    public function create(){

    }
//"Grade_id" => "1"
//"Classroom_id" => "1"
//"section_id" => "1"

    public function softdelete($request)
    {
        $students = Student::where('grade_id',$request->Grade_id)
            ->where('classroom_id',$request->Classroom_id)
            ->where('section_id',$request->section_id)
            ->get();
         if(count($students) < 1){
            return back()->with('error_Graduated','لا يوجود طلاب ');
        }
         foreach($students as $student){
             $ids = explode(',',$student->id);
             Student::whereIn('id',$ids)->delete();
         }
    }

}
