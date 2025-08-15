<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Student;
use App\Repository\GraduatedRepositoryInterface;
use Illuminate\Http\Request;

class GraduatedController extends Controller
{
    public $graduated;
    public function __construct(GraduatedRepositoryInterface $graduated)
    {
        $this->graduated = $graduated;
    }


    public function index()
    {
        $students = Student::onlyTrashed()->get();
        return view('students.graduated.list_graduated',compact('students'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('students.graduated.add_graduated',compact('grades'));
    }


    public function store(Request $request)
    {
        $request->validate([
            "Grade_id" => 'required',
            "Classroom_id" => 'required',
            "section_id" => 'required',
        ],[
           'Grade_id.required' =>'اسم المرحلة مطلوب',
            'Classroom_id.required' =>'اسم الصف الدراسي مطلوب',
            'section_id.required' =>'اسم الصف القسم مطلوب',
        ]);
        toastr()->success('تم حفظ البيانات بنجاح');
        $this->graduated->softdelete($request);
        return redirect()->route('graduated.index');
     }


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
       Student::onlyTrashed()->where('id',$request->id)->first()->restore();
        toastr()->success('تم حفظ ارجاع الطالب بنجاح');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id , Request $request)
    {
        Student::onlyTrashed()->where('id',$request->id)->first()->forceDelete();
        toastr()->error('تم حذف الطالب نهائيا');
        return back();
    }
}
