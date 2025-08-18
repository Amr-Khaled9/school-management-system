<?php

namespace App\Repository;

use App\Models\Subject;

class SubjectRepository implements SubjectRepositoryInterface
{
//"Name_ar" => "NLP"
//"Name_en" => "NLP"
//"Grade_id" => "1"
//"Class_id" => "1"
//"teacher_id" => "1"
     public function store($request)
    {
        $subject = new Subject();
        $subject->name =$request->Name_ar;
        $subject->grade_id =$request->Grade_id;
        $subject->classroom_id =$request->Class_id;
        $subject->teacher_id =$request->teacher_id;
         $subject->save();
    }

    public function update($request)
    {
        $subject = Subject::findOrFail($request->id)  ;
        $subject->name =$request->Name_ar;
        $subject->grade_id =$request->Grade_id;
        $subject->classroom_id =$request->Class_id;
        $subject->teacher_id =$request->teacher_id;
        $subject->save();
    }
}
