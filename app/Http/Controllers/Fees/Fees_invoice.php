<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Models\Grade;
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

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
