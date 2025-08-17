<?php

namespace App\Repository;

use App\Models\Processing_fee;
use App\Models\Receipt_Student;
use App\Models\Student;
use App\Models\Student_account;
use Illuminate\Support\Facades\DB;

class ProcessingFeeRepository implements ProcessingFeeRepositoryInterface
{
//"Debit" => "7000"
//"student_id" => "1"
//"final_balance" => "7,000.00"
//"description" => "خالص"
public function store($request)
{
    DB::beginTransaction();

    $processing = new Processing_fee();
    $processing->student_id =$request->student_id;
    $processing->amount =$request->Debit;
    $processing->description =$request->description;
    $processing->save();

    $receipt =  Receipt_Student::where('student_id',$request->student_id)->first();
    $student = Student::find($request->student_id);
    $student_account = new Student_account();
    $student_account->student_id = $request->student_id;
    $student_account->grade_id = $student->grade_id;
    $student_account->receipt_id = $receipt->id;
    $student_account->classroom_id= $student->classroom_id;
    $student_account->processing_id= $processing->id;
    $student_account->debit = 0.00;
    $student_account->credit = $request->Debit;
    $student_account->type ='processingfee';
    $student_account->description = $request->description;
    $student_account->save();

    DB::commit();
}
    public function update($request)
    {
        DB::beginTransaction();

        $processing = Processing_fee::findOrfail($request->id);
        $processing->student_id =$request->student_id;
        $processing->amount =$request->Debit;
        $processing->description =$request->description;
        $processing->save();

        $receipt =  Receipt_Student::where('student_id',$request->student_id)->first();
        $student = Student::find($request->student_id);
        $student_account =  Student_account::where('student_id',$request->student_id)->first();
        $student_account->student_id = $request->student_id;
        $student_account->grade_id = $student->grade_id;
        $student_account->receipt_id = $receipt->id;
        $student_account->classroom_id= $student->classroom_id;
        $student_account->processing_id= $processing->id;
        $student_account->debit = 0.00;
        $student_account->credit = $request->Debit;
        $student_account->type ='processingfee';
        $student_account->description = $request->description;
        $student_account->save();

        DB::commit();
    }

}
