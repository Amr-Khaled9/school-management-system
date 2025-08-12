<?php

namespace App\Http\Controllers\Students;

use App\Models\Section;
use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Flasher\Toastr\Laravel\Facade\Toastr;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Repository\StudentsRepositoryInterface;

class StudentController extends Controller
{
    public $student;
    public function __construct(StudentsRepositoryInterface $student)
    {
        $this->student = $student;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = $this->student->indexStudent();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->student->createStudent();
    }
    public function Get_classrooms($id)
    {
        $list_classes =  Classroom::where('grade_id', $id)->pluck("name", "id");
        return $list_classes;
    }
    public function Get_Sections($id)
    {
        $list_sections =  Section::where('classroom_id', $id)->pluck("name", "id");
        return $list_sections;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
      return   $this->student->storeStudent($request);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id) {

    $student=  $this->student->showDetails($id);
    return view('students.show',compact('student'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->student->editStudent($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request,  $id)
    {
        $this->student->updateStudent($request, $id);
        toastr()->success('تم التعديل بنجاح');
        return redirect()->to(route('student.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->student->destroyStudent( $id);
        toastr()->error('تم حذف بنجاح');
        return redirect()->to(route('student.index'));
    }

    public function upload_attachment(Request $request)
    {
        return $this->student->upload_attachment($request);
    }

    public function delete_attachment($id,Request $request)
    {
        $this->student->delete_attachment($id, $request);
        toastr()->error('تم حذف المرفق');
        return back();
    }
    public function download_attachment($name ,$filename)
    {

        toastr()->success('تم التنزيل بنجاح');

        return  $this->student->download_attachment($name ,$filename);

    }
}
