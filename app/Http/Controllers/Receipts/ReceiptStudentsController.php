<?php

namespace App\Http\Controllers\Receipts;

use App\Http\Controllers\Controller;
use App\Http\Requests\RecepitStoreRequest;
use App\Models\Receipt_Student;
use App\Models\Student;
use App\Models\Student_account;
use App\Repository\ReceiptStudentsRepositoryInterface;
use Illuminate\Http\Request;

class ReceiptStudentsController extends Controller
{
    public $receiptStudent;
    public function __construct(ReceiptStudentsRepositoryInterface $receiptStudent)
    {
        $this->receiptStudent=$receiptStudent;
    }

    public function index()
    {
        $receipt_students = Receipt_Student::all();
        return view('Recepit.index',compact('receipt_students'));
    }

    public function create()
    {
        //
    }

    public function store(RecepitStoreRequest $request)
    {
        $this->receiptStudent->store($request);
        toastr()->success('تم اضافة البيانات بنجاح');
        return redirect()->route('receipt_student.index');
    }


    public function show($id)
    {
         $student = Student::findOrFail($id);
        return view('Recepit.add',compact('student'));
    }


    public function edit(  $id)
    {
        $receipt_student=Receipt_Student::findOrFail($id);
        return view('Recepit.edit',compact('receipt_student'));
    }


    public function update(Request $request,$id)
    {
         $this->receiptStudent->update($request);
        toastr()->success('تم تعديل البيانات بنجاح');
        return redirect()->route('receipt_student.index');
    }


    public function destroy(Request $request)
    {
        $this->receiptStudent->destroy($request);
        toastr()->error('تم الحذف');
        return redirect()->route('receipt_student.index');
     }
}
