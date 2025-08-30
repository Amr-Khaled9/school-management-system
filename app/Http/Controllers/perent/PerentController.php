<?php

namespace App\Http\Controllers\perent;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Attendence;
use App\Models\Fees_invoice;
use App\Models\Receipt_Student;
use App\Models\MyPerent;
use Illuminate\Support\Facades\Hash;

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

    public function fee()
    {
        $students = Student::where('parent_id',auth()->guard('perent')->user()->id)->pluck('id') ;
        $Fee_invoices =Fees_invoice::whereIn('student_id',$students)->get();
        return view('perents.fee',compact('students','Fee_invoices'));

    }
    public function receipt($id)
    {
        $student = Student::where('id',$id)->where('parent_id',auth()->guard('perent')->user()->id)->first();
        if(empty($student )){
            toastr()->error('لا يوجد هذا الطالب');
            return redirect()->route('sons.fee');
        }
        $receipt_students= Receipt_Student::where('student_id',$student->id)->get();
        if ($receipt_students->isEmpty()) {
            toastr()->error('لا يوجد مدفوعات');
            return redirect()->route('sons.fee');
        }
        return view('perents.receipt',compact('receipt_students'));

    }

    public function viewProfile()
    {

        $information =  auth('perent')->user();
        return view('perents.profile',compact('information'));
    }
    public function updateProfile(Request $request)
    {
        $teacher =MyPerent::where('id',$request->id)->first();

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
