<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeesStoreRequest;
use App\Models\Classroom;
use App\Models\Fees;
use App\Models\Grade;
use App\Repository\FeesRepositoryInterface;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    public $fees ;
    public function __construct(FeesRepositoryInterface $fees)
    {
        $this->fees =$fees;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fees = Fees::all();
       return view('Fees.index',compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grades = Grade::select('id', 'name')->get();
         return view('Fees.add',compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeesStoreRequest $request)
    {
        $this->fees->store($request);
        toastr()->success('تم اضافة البيانات بنجاح');
        return redirect()->route('fees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fees $fees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $fee = Fees::where('id',$id)->first();
        $grades = Grade::select('id', 'name')->get();

        return view('fees.edit',compact('fee','grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FeesStoreRequest $request, Fees $fees)
    {
       $this->fees->update($request);
       toastr()->success('تم تعديل البيانات بنجاح');
       return redirect()->route('fees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id ,Request $request)
    {
        $fee = Fees::where('id',$request->id)->delete();
        toastr()->error('تم حذف البيانات ');
        return redirect()->route('fees.index');
    }
}
