<?php

namespace App\Http\Controllers\Quizzes;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizzeStoreRequest;
use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use App\Repository\QuizzeRepositoryInterface;
use Illuminate\Http\Request;

class QuizzeController extends Controller
{
    public $quizze;
    public function __construct(QuizzeRepositoryInterface $quizze)
    {
        $this->quizze = $quizze;
     }

    public function index()
    {
        $quizzes = Quizze::get();
        return view('quizzes.index',compact('quizzes'));
    }

    public function create()
    {
        $grades = Grade::select('id','name')->get();
        $teachers = Teacher::select('id','name')->get();
        $subjects = Subject::select('id','name')->get();
        $sections = Section::select('id','name')->get();
        return view('quizzes.create',compact('grades','teachers','subjects','sections'));

    }

    public function store(QuizzeStoreRequest $request)
    {
        $this->quizze->store($request);
        toastr()->success('تم اضافة البيانات');
        return redirect()->route('quizze.index');
    }

    public function show(Quizze $quizze)
    {
        //
    }


    public function edit($id)
    {
        $quizz = Quizze::findOrFail($id);

        $grades = Grade::select('id','name')->get();
        $teachers = Teacher::select('id','name')->get();
        $subjects = Subject::select('id','name')->get();
        $sections = Section::select('id','name')->get();
        return view('quizzes.edit',compact('quizz','grades','teachers','subjects','sections'));
    }


    public function update(QuizzeStoreRequest $request )
    {
        $this->quizze->update($request);
        toastr()->success('تم تعديل البيانات');
        return redirect()->route('quizze.index');
    }


    public function destroy(Request $request)
    {
        $quizze = Quizze::findOrfail($request->id);
        $quizze->delete();
        toastr()->error('تم حذف البيانات');
        return redirect()->route('quizze.index');

    }
}
