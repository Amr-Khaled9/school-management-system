<?php

namespace App\Repository;

use App\Models\Fees_invoice;
use App\Models\Fees;
use App\Models\Student;
use App\Models\Student_account;
use DeepCopyTest\Matcher\Y;

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
    //"List_Fees" => array:1 [▼
//0 => array:4 [▼
//"student_id" => "2"
//"fee_id" => "2"
//"amount" => "10000.00"
//"description" => "aaa"
//]
//]
//"Grade_id" => "2"
//"Classroom_id" => "1"

    public function store($request)
    {
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


            $Student_account = new Student_account();
            $Student_account->student_id = $list_fee['student_id'];
            $Student_account->debit = $list_fee['amount'];
            $Student_account->type = 'invoice';
            $Student_account->credit = 0.00;
            $Student_account->description = $list_fee['description'];
            $Student_account->grade_id = $request->Grade_id;
            $Student_account->classroom_id = $request->Classroom_id;
            $Student_account->save();

        }
    }
//  "title_ar" => "aaaa"
//  "id" => "1"
//  "amount" => "10000.00"
//  "fee_id" => "2"
//  "description" => "aaa"

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
