<?php

namespace App\Repository;

use App\Models\Attendence;

class AttendenceRepository implements AttendenceRepositoryInterface
{


    public function store($request){
        if($request->attendences >0 ) {
            foreach ($request->attendences as $studentid => $attendence) {
                if ($attendence == 'presence') {
                    $status = true;
                } else {
                    $status = false;
                }
                Attendence::create([
                    'student_id' => $studentid,
                    'grade_id' => $request->grade_id,
                    'classroom_id' => $request->classroom_id,
                    'section_id' => $request->section_id,

                        // لو المعلم هو اللي مسجل دخول
                    'teacher_id' => auth()->guard('teacher')->user()->id,

                    'attendence_date' => date('Y-m-d'),
                    'attendence_status' => $status,
                ]);
                toastr()->success('تم حفظ البيانات ');
            }
        }else{
            toastr()->error('يجب ادخال طالب واحد علي الاقل');
        }


    }

}
