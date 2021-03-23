<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;

class TaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // tax list
    public function taxList()
    {
        $taxes=Tax::all();
        return view('tax-list',compact('taxes'));
    }
    //add tax
    public function addList()
    {
        return view('add-tax');
    }
    //store tax
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tax_name' => 'required|max:255',
            'tax_parcent' => 'required',
        ]);
        $tax=new Tax();
        $tax->tax_name=$request->tax_name;
        $tax->tax_parcent=$request->tax_parcent;
       // return response()->json($tax);
        $tax->save();
        return back()->with('tax_added','Tax information inserted successfully');

    }
    //edit tax
    public function editTax($id)
    {
        $tax=Tax::find($id);
        return view('edit-tax',compact('tax'));
    }
    //update tax
    public function updateTax(Request $request)
    {
        $validatedData = $request->validate([
            'tax_name' => 'required|max:255',
            'tax_parcent' => 'required',
        ]);
        $tax=Tax::find($request->id);
        $tax->tax_name=$request->tax_name;
        $tax->tax_parcent=$request->tax_parcent;
       // return response()->json($tax);
        $tax->save();
        return back()->with('tax_added','Tax information updated successfully');
    }
    //delete tax
    public function deleteTax($id)
    {
        $tax=Tax::find($id);
        $tax->delete();
        //return response()->json($doctor);
        return back()->with('tax_deleted','Tax information deleted successfully');
    }
}
