<?php

namespace App\Http\Controllers\Grades;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Requests\GradeRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;
use function Flasher\Toastr\Prime\toastr;


class GradeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $grades = Grade::all();
    return view("grades.index", compact('grades'));
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
  public function store(GradeRequest $request)
  {
    // dd($request->all());
    // validation 
    // store in db 
    $grade = new Grade;
    $grade->name = $request->name;
    $grade->notes = $request->notes;
    $grade->save();
    // show massege successful
    toastr()->success('تم اضافة المرحلة');  // بكدج جديده اسمها Toastr
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
  public function update($id , UpdateRequest $request) {
    // get user by id
    $grade =Grade::findOrFail($id);
    // Validation 
    //update data 
    $grade->update([
      'name'=>$request->name,
      'notes' => $request->notes
    ]);
    toastr()->success('تم تعديل المرحلة بنجاح');
    return back();
  
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id) {
      $grade =Grade::findOrFail($id);
    $grade->delete();
    toastr()->error('تم حذف المرحلة الدراسية');
        return back();


  }
}
