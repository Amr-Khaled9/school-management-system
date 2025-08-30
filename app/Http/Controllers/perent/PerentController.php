<?php

namespace App\Http\Controllers\perent;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Attendence;
use Illuminate\Support\Facades\DB;


class PerentController extends Controller
{
   public function index()
   {
       $students = Student::where('parent_id',auth()->guard('perent')->user()->id)->get() ;
        return view('perents.index',compact('students'));
    }

    public function result($id)
    {
        $student = Student::where('id',$id)->where('parent_id',auth()->guard('perent')->user()->id)->first();
        if(empty($student )){
            toastr()->error('لا يوجد هذا الطالب');
            return back();
        }
        $degrees = Degree::where('student_id', $student->id)->get();

        if ($degrees->isEmpty()) {
            toastr()->error('لا يوجد نتائج');
            return back();
        }

        return view('perents.degree', compact('degrees'));


    }
    public function attendance()
    {
        $students = Student::where('parent_id',auth()->guard('perent')->user()->id)->get() ;
        return view('perents.attendance',compact('students'));
    }
    public function attendanceSearch(Request $request)
    {
        $request->validate([
            'from' => 'required|date|date_format:Y-m-d',
            'to' => 'required|date|date_format:Y-m-d|after_or_equal:from'
        ], [
            'to.after_or_equal' => 'تاريخ النهاية لابد ان اكبر من تاريخ البداية او يساويه',
            'from.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
            'to.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
        ]);

        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();

        if ($request->student_id == 0) {

            $Students = Attendence::whereBetween('attendence_date', [$request->from, $request->to])->get();
            return view('perents.attendance', compact('Students', 'students'));
        } else {

            $Students = Attendence::whereBetween('attendence_date', [$request->from, $request->to])
                ->where('student_id', $request->student_id)->get();
            return view('perents.attendance', compact('Students', 'students'));

        }
    }
}
