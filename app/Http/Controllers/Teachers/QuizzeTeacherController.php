<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quizze;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Question;

class QuizzeTeacherController extends Controller
{

    public function index()
    {
        $quizzes = Quizze::where('teacher_id',auth()->guard('teacher')->user()->id)->get();
        return view('teachers.quizze.index',compact('quizzes'));

    }


    public function create()
    {
         $grades = Grade::all();
        $subjects = Subject::all();
        return view('teachers.quizze.create',compact('grades','subjects'));
    }

    public function store(Request $request)
    {

        $quizzes = new Quizze();
        $quizzes->name = $request->name_ar;
        $quizzes->subject_id = $request->subject_id;
        $quizzes->grade_id = $request->Grade_id;
        $quizzes->classroom_id = $request->Classroom_id;
        $quizzes->section_id = $request->section_id;
        $quizzes->teacher_id = auth()->guard('teacher')->user()->id;
        $quizzes->save();
        toastr()->success("تم حفظ البيانات بنجاح");
        return redirect()->route('quizzes.index');

     }

    public function show($id)
    {
        $questions = Question::where('quizze_id',$id)->get();
        $quizz = Quizze::findOrFail($id);
        return view('teachers.question.index',compact('questions','quizz'));

    }

    public function edit(  $id)
    {
        $quizz = Quizze::findorFail($id);
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::where('teacher_id',auth()->user()->id)->get();
        return view('teachers.quizze.edit', $data, compact('quizz'));
    }

    public function update(Request $request, string $id)
    {
        $quizz = Quizze::findorFail($request->id);
        $quizz->name =  $request->Name_ar;
        $quizz->subject_id = $request->subject_id;
        $quizz->grade_id = $request->Grade_id;
        $quizz->classroom_id = $request->Classroom_id;
        $quizz->section_id = $request->section_id;
        $quizz->teacher_id =auth()->guard('teacher')->user()->id;
        $quizz->save();
        toastr()->success("تم حفظ البيانات بنجاح");
        return redirect()->route('quizzes.index');
    }

    public function destroy(  $id)
    {
        $quizz = Quizze::findorFail( $id);
        $quizz->delete();
        toastr()->error("تم حذف البيانات  ");
        return redirect()->route('quizzes.index');
    }
}
