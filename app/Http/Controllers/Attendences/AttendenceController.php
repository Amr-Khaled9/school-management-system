<?php

namespace App\Http\Controllers\Attendences;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttendStoreRequest;
use App\Models\Attendence;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;
use App\Repository\AttendenceRepositoryInterface;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    public $attendence;
    public function __construct(AttendenceRepositoryInterface $attendence)
    {
        $this->attendence =$attendence;
    }

    public function index()
    {
        $grades =Grade::with('sections')->get();
        $list_Grades = Grade::all();
        $teachers = Teacher::all();
        return view('attendence.section',compact('grades','list_Grades','teachers'));
    }


    public function create()
    {
        //
    }


    public function store(AttendStoreRequest $request)
    {
          $this->attendence->store($request);
           return Back();
    }


    public function show( $id)
    {
        $students =Student::with('attendence')->where('section_id',$id)->get();
        return view('attendence.index',compact('students'));
    }


    public function edit(Attendence $attendence)
    {
        //
    }


    public function update(Request $request, Attendence $attendence)
    {
        //
    }


    public function destroy(Attendence $attendence)
    {
        //
    }
}
