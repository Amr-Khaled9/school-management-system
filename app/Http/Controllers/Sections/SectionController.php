<?php

namespace App\Http\Controllers\Sections;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Teacher;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::with(['Sections'])->get();
        $list_grades = Grade::all();
        $teachers = Teacher::all();
        return view('sections.index', compact('grades', 'list_grades', 'teachers'));
    }


    public function getclass($id)
    {
        $list_classes = Classroom::where("grade_id", $id)->pluck("name", "id");
        return $list_classes;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSectionRequest $request)
    {
        // dd($request->all());
        // validation
        // insert DB 
        $section = new Section;
        $section->name = $request->name;
        $section->status = 1;
        $section->grade_id = $request->grade_id;
        $section->classroom_id = $request->classroom_id;
        $section->save();
        // relation many to many 
        $section->teachers()->attach($request->teacher_id);
        // return massage
        toastr()->success('تم اضافة القسم بنجاح');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSectionRequest $request, $id)
    {
        // dd($request->all());
        //Validation 
        // update in db
        $section = Section::findOrFail($id);
        $section->name = $request->name;
        $section->grade_id = $request->grade_id;
        $section->classroom_id = $request->classroom_id;
        if ($request->status == 'on') {
            $section->status = 1;
        } else {
            $section->status = 0;
        }
        // update pivot table 
        if (isset($request->teacher_id)) {
            $section->teachers()->sync($request->teacher_id);
        } else {
            $section->teachers()->sync(array());
        }
        $section->save();
        toastr()->success('تم تعديل القسم بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Section::findOrFail($request->id)->delete();
        toastr()->error('تم حذف القسم بنجاح');
        return back();
    }
}
