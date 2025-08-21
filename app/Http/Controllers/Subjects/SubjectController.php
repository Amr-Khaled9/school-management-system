<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectStoreRequest;
use App\Http\Requests\SubjectUpdateRequest;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use App\Repository\SubjectRepositoryInterface;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public $subject;
    public function __construct(SubjectRepositoryInterface $subject)
    {
        $this->subject =$subject;
    }

    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index',compact('subjects'));
    }


    public function create()
    {
        $grades =Grade::select('id','name')->get();
        $teachers = Teacher::select('id','name')->get();
        return view('subjects.create',compact('grades','teachers'));
    }


    public function store(SubjectStoreRequest $request)
    {
        $this->subject->store($request);
        toastr()->success('تم حفظ بيانات الماده');
       return redirect()->route('subject.index');
    }


    public function show(Subject $subject)
    {
        //
    }

    public function edit( $id  )
    {
         $subject =Subject::findOrfail($id);
        $grades =Grade::select('id','name')->get();
        $teachers = Teacher::select('id','name')->get();
        return view('subjects.edit',compact('grades','teachers','subject'));
    }

    public function update(SubjectUpdateRequest $request )
    {
         $this->subject->update($request);
        toastr()->success('تم حفظ تعديلات الماده');
        return redirect()->route('subject.index');
    }


    public function destroy( Request $request)
    {
        Subject::where('id',$request->id)->delete();
        toastr()->error('تم حذف الماده');
        return back();
    }
}
