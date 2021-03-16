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
        $tax=new Tax();
        $tax->tax_name=$request->tax_name;
        $tax->tax_parcent=$request->tax_parcent;
       // return response()->json($tax);
        $tax->save();
        return back()->with('tax_added','Tax information inserted successfully');

    }
}
