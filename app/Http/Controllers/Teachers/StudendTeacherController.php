<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Grade;
use App\Models\Attendence;
use Illuminate\Support\Facades\DB;
class StudendTeacherController extends Controller
{

    public function index()
    {
        $ids= DB::table('teacher_section')->where('teacher_id',auth()->guard('teacher')->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id',$ids)->get();
         return view('teachers.student.index',compact('students'));
    }
    public function section()
    {
        $ids= DB::table('teacher_section')->where('teacher_id',auth()->guard('teacher')->user()->id)->pluck('section_id');
        $sections = Student::whereIn('id',$ids)->get();
         return view('teachers.student.section',compact('sections'  ));

    }
    public function attendance(Request $request)
    {
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
                    'teacher_id' => auth()->guard('teacher')->user()->id,
                    'attendence_date' => date('Y-m-d'),
                    'attendence_status' => $status,
                ]);
                toastr()->success('تم حفظ البيانات ');
            }
        }else{
            toastr()->error('يجب ادخال طالب واحد علي الاقل');
        }

        return back();
    }

    public function attendanceEdit(Request $request)
    {
//        dd($request->all());
             $date = date('Y-m-d');
            $student_id = Attendence::where('attendence_date',$date)->where('student_id',$request->id)->first();
            if( $request->attendence == 'presence' ) {
                $attendence_status = true;
            } else if( $request->attendence == 'absent' ){
                $attendence_status = false;
            }
            $student_id->update([
                'attendence_status'=> $attendence_status
            ]);
            toastr()->success('تم التعديل بنجاح');
            return redirect()->back();


    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
