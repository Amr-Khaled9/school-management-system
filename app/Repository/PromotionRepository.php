<?php


namespace App\Repository;


use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;

class PromotionRepository implements PromotionRepositoryInterface
{

    public function index()
    {
        return Grade::all();
    }

    public function store($request)
    {
       $students = Student::where('grade_id',$request->Grade_id)
           ->where('classroom_id',$request->Classroom_id)
           ->where('section_id',$request->section_id)->get();
       // update table student
        foreach($students as $student) {
            $ids = explode(',', $student->id);
            Student::whereIn('id', $ids)->update([
                'grade_id' => $request->Grade_id_new,
                'classroom_id' => $request->Classroom_id_new,
                'section_id' => $request->section_id_new
            ]);

            Promotion::updateOrCreate([
                'student_id' => $student->id,
                'from_grade' => $request->Grade_id,
                'from_classroom' => $request->Classroom_id,
                'from_section' => $request->section_id,
                'to_grade' =>  $request->Grade_id_new,
                'to_classroom' =>$request->Classroom_id_new,
                'to_section' => $request->section_id_new,
            ]);
        }

        toastr()->success('تم ترقية الطلاب');
        return back();
    }
}
