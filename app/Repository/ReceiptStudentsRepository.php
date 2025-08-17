<?php

namespace App\Repository;

use App\Models\Found_Account;
use App\Models\Receipt_Student;
use App\Models\Student;
use App\Models\Student_account;
use Illuminate\Support\Facades\DB;

class ReceiptStudentsRepository implements ReceiptStudentsRepositoryInterface
{
    public function store( $request)
    {
        DB::beginTransaction();


        $receipt = new Receipt_Student();
        $receipt->date =date('Y-m-d');
        $receipt->student_id = $request->student_id;
        $receipt->debit = $request->debit;
        $receipt->description = $request->description;
        $receipt->save();

        $found_account = new Found_Account();
        $found_account->date =date('Y-m-d');
        $found_account->receipt_id=$receipt->id;
        $found_account->debit=$request->debit;
         $found_account->credit=0.00;
        $found_account->description=$request->description;
        $found_account->save();

        $student = Student::find($request->student_id);
        $student_account = new Student_account();
        $student_account->student_id = $request->student_id;
        $student_account->grade_id = $student->grade_id;
        $student_account->receipt_id = $receipt->id;
        $student_account->classroom_id= $student->classroom_id;
        $student_account->debit = 0.00;
        $student_account->credit = $request->debit;
        $student_account->type ='invoice';
        $student_account->description = $request->description;
        $student_account->save();

        DB::commit();
    }

    public function update( $request)
    {
    DB::beginTransaction();
        $receipt_students = Receipt_Student::findorfail($request->id);

        $receipt_students->date =date('Y-m-d');
        $receipt_students->student_id = $request->student_id;
        $receipt_students->debit = $request->Debit;
        $receipt_students->description = $request->description;
        $receipt_students->save();

        $fund_accounts = Found_Account::where('receipt_id',$request->id)->first();

        $fund_accounts->date =date('Y-m-d');
        $fund_accounts->receipt_id=$receipt_students->id;
        $fund_accounts->debit=$request->Debit;
        $fund_accounts->credit=0.00;
        $fund_accounts->description=$request->description;
        $fund_accounts->save();

        $student_account = Student_account::where('receipt_id',$request->id)->first();

        $student = Student::find($request->student_id);
        $student_account->student_id = $request->student_id;
        $student_account->grade_id = $student->grade_id;
        $student_account->receipt_id = $receipt_students->id;
        $student_account->classroom_id= $student->classroom_id;
        $student_account->debit = 0.00;
        $student_account->credit = $request->Debit;
        $student_account->type ='invoice';
        $student_account->description = $request->description;
        $student_account->save();

        DB::commit();
    }

    public function destroy($request){
        Receipt_Student::where('id',$request->id)->delete();
    }

}
