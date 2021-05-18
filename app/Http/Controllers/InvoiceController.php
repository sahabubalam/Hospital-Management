<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\Department;
use App\Models\Tax;
use DB;


class InvoiceController extends Controller
{
    public function invoiceList()
    {
        return view('invoice-list');
    }
    public function addInvoice()
    {
        $patients=Patient::all();
        $departments=Department::all();
        $taxes=Tax::all();
        return view('add-invoice',compact('patients','departments','taxes'));
    }
    public function storeInvoice(Request $request)
    {
        $invoiceCount=count($request->item_name);
        if( $invoiceCount!=NULL)
        {
            for($i=0;$i< $invoiceCount;$i++)
            {
                $invoice = new Invoice();
                $invoice->patient_id=$request->patient_id;
                $invoice->department_id=$request->department_id;
                $invoice->tax=$request->tax;
                $invoice->date=date('d/m/y');
                $invoice->item_name=$request->item_name[$i];
                $invoice->description=$request->description[$i];
                $invoice->unit_cost=$request->unit_cost[$i];
                $invoice->qty=$request->qty[$i];
                $invoice->amount=$request->amount[$i];
                $invoice->save();
            }
            
        }
        return back()->with('invoice_created','Invoice information inserted successfully');

    }
}
