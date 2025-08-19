<?php

namespace App\Http\Controllers\Questions;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionStoreRequest;
use App\Models\Question;
use App\Models\Quizze;
use App\Repository\QuestionRepositoryInterface;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public $question;
public function __construct(QuestionRepositoryInterface $question)
{
    $this->question = $question;
}
    public function index()
    {
        $questions =Question::all();
        return view('questions.index',compact('questions'));
    }

    public function create()
    {
        $quizzes = Quizze::select('id', 'name')->get();
        return view('questions.create',compact('quizzes'));
    }

    public function store(QuestionStoreRequest $request)
    {
        $this->question->store($request);
        toastr()->success('تم اضافة البيانات');
        return redirect()->route('question.index');
    }

    public function show(Question $question)
    {
        //
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $quizzes = Quizze::select('id', 'name')->get();
        return view('questions.edit',compact('quizzes','question'));
    }

    public function update(QuestionStoreRequest $request )
    {
        $this->question->update($request);
        toastr()->success('تم تعديل البيانات');
        return redirect()->route('question.index');
    }

    public function destroy(Request $request )
    {
        $question = Question::findOrFail($request->id);
        $question->delete();
        toastr()->error('تم حذف البيانات');
        return redirect()->route('question.index');
    }
}
