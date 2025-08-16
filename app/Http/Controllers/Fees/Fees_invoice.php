<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Models\Fees;
use App\Models\Grade;
use App\Models\Student_account;
use App\Repository\FeesInvoiceRepositoryInterface;
use Illuminate\Http\Request;

class Fees_invoice extends Controller
{
    public $fees_invoice;
    public function __construct(FeesInvoiceRepositoryInterface $fees_invoice){
        $this->fees_invoice =$fees_invoice;
    }

    public function index()
    {
        $Fee_invoices = \App\Models\Fees_invoice::all();
        $Grades =Grade::all();
        return view('fee_invoice.index',compact('Fee_invoices','Grades'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
       $this->fees_invoice->store($request);
       toastr()->success('تم حفظ البيانات');
       return redirect()->route('fees_invoice.index');

    }

    public function show( $id)
    {
        return $this->fees_invoice->show($id);
    }

    public function edit($id)
    {
       $fee_invoices = \App\Models\Fees_invoice::findOrFail($id);
       $fees =Fees::where('classroom_id',$fee_invoices->classroom_id)->get();
       return view('fee_invoice.fee_invoice_edit',compact('fee_invoices','fees'));

    }

    public function update(Request $request, string $id)
    {
        $this->fees_invoice->update($request);
        toastr()->success('تم حفظ التعديل');
        return redirect()->route('fees_invoice.index');



    }

    public function destroy($id,Request $request)
    {
        $fee = \App\Models\Fees_invoice::where('id',$request->id)->delete();
        $Student_account = Student_account::where('id',$request->id)->delete();
        toastr()->error('تم حذف البيانات');
        return Back();

    }
}
