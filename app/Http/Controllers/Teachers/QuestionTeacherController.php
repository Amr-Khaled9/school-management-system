<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;


class QuestionTeacherController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $question = new Question();
        $question->title = $request->title;
        $question->answers = $request->answers;
        $question->right_answer = $request->right_answer;
        $question->score = $request->score;
        $question->quizze_id = $request->quizz_id;
        $question->save();
        toastr()->success("تم حفظ بيانات السؤال");
        return redirect()->back();
     }

    public function show($id)
    {
        $quizz_id = $id;
        return view('teachers.question.create', compact('quizz_id'));
    }

    public function edit(  $id)
    {
        $question = Question::findorFail($id);
        return view('teachers.question.edit', compact('question'));
    }

    public function update(Request $request, string $id)
    {
        $question = Question::findorfail($id);
        $question->title = $request->title;
        $question->answers = $request->answers;
        $question->right_answer = $request->right_answer;
        $question->score = $request->score;
        $question->save();
        toastr()->success('تم حفظ التعديلات');
        return redirect()->back();
    }

    public function destroy($id)
    {
        Question::destroy($id);
        toastr()->error(  "تم الحذف");
        return redirect()->back();
    }
}
