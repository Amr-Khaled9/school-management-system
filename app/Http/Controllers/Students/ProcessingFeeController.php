<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProcessingFeeStoreRequest;
use App\Models\Processing_fee;
use App\Models\Student;
use App\Repository\ProcessingFeeRepositoryInterface;
use Illuminate\Http\Request;

class ProcessingFeeController extends Controller
{
    public $processing;
    public function __construct(ProcessingFeeRepositoryInterface $processing)
    {
        $this->processing = $processing;
    }

    public function index()
    {
        $ProcessingFees =Processing_fee::all();
        return view('processing_fees.index',compact('ProcessingFees'));
    }


    public function create()
    {
        //
    }


    public function store(ProcessingFeeStoreRequest $request)
    {
        $this->processing->store($request);
        toastr()->success('تم اضافة البيانات بنجاح');
        return redirect()->route('processing_fee.index');
    }


    public function show( $id)
    {
        $student = Student::findOrfail($id);
        return view('processing_fees.add',compact('student'));
    }


    public function edit($id)
    {
        $ProcessingFee = Processing_fee::where('id',$id)->first();
        return view('processing_fees.edit',compact('ProcessingFee'));

    }


    public function update(Request $request )
    {
        $this->processing->update($request);
        toastr()->success('تم تعديل البيانات');
        return redirect()->route('processing_fee.index');
    }


    public function destroy(Request $request)
    {
        Processing_fee::destroy($request->id);
        toastr()->error('تم حذف البيانات');
        return redirect()->route('processing_fee.index');
    }
}
