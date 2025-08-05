<?php

namespace App\Http\Controllers\Classrooms;

use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassroom;
use App\Http\Requests\UpdateClassroomRequest;

class ClassroomController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $classrooms = Classroom::all();
    $grades = Grade::all();
    return view('classrooms.index', compact('classrooms', 'grades'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create() {}

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreClassroom $request)
  {
    //validation ->>>>>>>>>>>>>>>>>>>في لقطه جديده بسبب وجود الداتا داخل array
    //store db and massage ->>>>>>>>>>>>>>>>>>>>>>> فيها برضو حته جديده عشان الداتا جيبه في شكل array

    $list_classes = $request->List_Classes;
    // dd($list_classes[0]);
    foreach ($list_classes as  $value) {
      $class = new Classroom;
      $class->name = $value['name'];
      $class->grade_id = $value['grade_id'];
      $class->save();
    }

    toastr()->success('تم اضافة الصف بنجاح');

    return back();
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id) {}

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id) {}

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(UpdateClassroomRequest $request, $id)
  {
    // dd($request->all());
    //Validation 
    // update in db
    $classroom = Classroom::findOrFail($request->id);
    $classroom->name = $request->name;
    $classroom->grade_id = $request->grade_id;
    $classroom->save();
    toastr()->success('تم تعديل الصف بنجاح');
    return back();
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request, $id)
  {
    // dd($request->id);
    // $request->validate([
    //   'id' => 'required|exists:classrooms,id'
    // ]);
    Classroom::findOrFail($request->id)->delete();
    toastr()->error('تم حذف الصف بنجاح');
    return back();
  }
}
