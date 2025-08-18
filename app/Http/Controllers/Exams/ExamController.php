<?php

namespace App\Http\Controllers\Exams;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamStoreRequest;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{

    public function index()
    {
        $exams =Exam::all();
        return view('exams.index',compact('exams'));
    }


    public function create()
    {
        return view('exams.create');
    }


    public function store(ExamStoreRequest $request)
    {
       $exam =Exam::create([
           "name" =>  $request->Name_ar,
            "term" =>  $request->term,
           "academic_year" => $request->academic_year,
       ]);
       toastr()->success('تم حفظ البيانات');
       return redirect()->route('exam.index');
    }


    public function show(Exam $exam)
    {
        //
    }


    public function edit($id)
    {
       $exam =Exam::findOrfail($id);
        return view('exams.edit',compact('exam'));

    }


    public function update(ExamStoreRequest $request)
    {
        $exam =Exam::findorfail($request->id);
        $exam->update([
            "name" =>  $request->Name_ar,
            "term" =>  $request->term,
            "academic_year" => $request->academic_year,
        ]);
        toastr()->success('تم تعديل البيانات');
        return redirect()->route('exam.index');
    }


    public function destroy(Request $request)
    {
        $exam =Exam::findorfail($request->id);
        $exam->delete();
        toastr()->error('تم حذف البيانات');
        return redirect()->route('exam.index');
    }
}
