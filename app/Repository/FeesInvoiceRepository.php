<?php

namespace App\Repository;

use App\Models\Fees_invoice;
use App\Models\Fees;
use App\Models\Receipt_Student;
use App\Models\Student;
use App\Models\Student_account;
use DeepCopyTest\Matcher\Y;
use Illuminate\Support\Facades\DB;

class FeesInvoiceRepository implements FeesInvoiceRepositoryInterface
{
    public function show( $id)
    {
        $student = Student::findorfail($id);
        $fees = Fees::where('classroom_id',$student->classroom_id)->get();
        return view('fee_invoice.fee_invoice_add',compact('student','fees'));
    }
    public function index()
    {

    }


    public function store($request)
    {
        DB::beginTransaction();

        foreach ($request->List_Fees as $list_fee) {
            $fee = new Fees_invoice();
            $fee->invoice_date = date('Y-m-d');
            $fee->student_id = $list_fee['student_id'];
            $fee->fee_id = $list_fee['fee_id'];
            $fee->amount = $list_fee['amount'];
            $fee->description = $list_fee['description'];
            $fee->grade_id = $request->Grade_id;
            $fee->classroom_id = $request->Classroom_id;
            $fee->save();



            $recepit = Receipt_Student::where('student_id',$list_fee['student_id'])->first();
            $student = Student::find($list_fee['student_id']);
            $student_account = new Student_account();
            $student_account->student_id = $list_fee['student_id'];
            $student_account->grade_id = $student->grade_id;
            $student_account->receipt_id = $recepit->id;
            $student_account->classroom_id= $student->classroom_id;
            $student_account->debit = $list_fee['amount'];
            $student_account->credit = 0.00;
            $student_account->type = 'invoice';
            $student_account->description = $request->description;
            $student_account->save();
            DB::commit();

        }
    }


        public function update($request){
                $fee =   Fees_invoice::findOrFail($request->id);
                $fee->invoice_date = date('Y-m-d');
                $fee->fee_id = $request->fee_id;
                $fee->amount = $request->amount ;
                $fee->description = $request->description;
                $fee->save();


                $Student_account = Student_account::findOrFail($request->id);
                $Student_account->debit = $request->amount ;
                $Student_account->credit = 0.00;
                $Student_account->description = $request->description;
                $Student_account->save();


    }


}
