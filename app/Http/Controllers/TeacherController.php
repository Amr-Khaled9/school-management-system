<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Flasher\Toastr\Laravel\Facade\Toastr;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateteacherRequest;
use App\Repository\TeacherRepositoryInterface;

class TeacherController extends Controller
{
    protected $teacher;
    public function __construct(TeacherRepositoryInterface $teacher)
    {
        $this->teacher = $teacher;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = $this->teacher->getAllTeachers();

        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specializations = $this->teacher->getAllSpecialization();
        return view('teachers.create', compact('specializations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        // validation
        // insert DB 
        $data = $request->except('_token');
        $this->teacher->storeTeacher($data);
        //send message 
        Toastr()->success('تم اضافة المعلم');
        return Back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $teacher = $this->teacher->editTeacher($id);
        $specializations = $this->teacher->getAllSpecialization();

        return view('teachers.edit', compact('teacher', 'specializations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateteacherRequest $request, $id)
    {
        //validation 
        $data = $request->except('_token');
        $this->teacher->updateTeacher($data, $id);
        Toastr()->success('تم تعديل المعلم ');
        return redirect()->route('teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->teacher->destroyTeacher($id);
        Toastr()->error('تم حذف المعلم ');
        return redirect()->route('teacher.index');
    }
}
