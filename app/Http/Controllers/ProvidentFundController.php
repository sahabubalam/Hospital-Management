<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProvidentFund;
use App\Models\Employee;
use DB;

class ProvidentFundController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //provident fund list
    public function providentFundList()
    {
        $fund=DB::table('provident_funds')
        ->join('employees','provident_funds.employee_id','employees.id')
        ->select('provident_funds.*','employees.first_name','employees.role')
        ->get();
        return view('provident-fund-list',compact('fund'));
    }
    public function addProvidentFund()
    {
        $employee=Employee::all();
        return view('add-provident-fund',compact('employee'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|max:255',
            'fund_type' => 'required',
            'employee_share' => 'required',
            'organization_share' => 'required',
        ]);
        $fund=new ProvidentFund();
        $fund->employee_id=$request->employee_id;
        $fund->fund_type=$request->fund_type;
        $fund->employee_share=$request->employee_share;
        $fund->organization_share=$request->organization_share;
        $fund->description=$request->description;
       // return response()->json($fund);
        $fund->save();
        return back()->with('fund_added','Provident Fund information inserted successfully');
    }
    public function editProvidentFund($id)
    {
        $employee=Employee::all();
        $fund=ProvidentFund::find($id);
        return view('edit-provident-fund',compact('fund','employee'));

    }
    public function updateProvidentFund(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|max:255',
            'fund_type' => 'required',
            'employee_share' => 'required',
            'organization_share' => 'required',
        ]);
        $fund=ProvidentFund::find($request->id);
        $fund->employee_id=$request->employee_id;
        $fund->fund_type=$request->fund_type;
        $fund->employee_share=$request->employee_share;
        $fund->organization_share=$request->organization_share;
        $fund->description=$request->description;
       // return response()->json($fund);
        $fund->save();
        return back()->with('fund_added','Provident Fund information updated successfully');
    }
    public function deleteProvidentFund($id)
    {
        $fund=ProvidentFund::find($id);
        $fund->delete();
        //return response()->json($doctor);
        return back()->with('fund','Provident fund information deleted successfully');
    }
    public function employeeProfile($id)
    {
        $employee=Employee::find($id);
        return view('employee-profile',compact('employee'));
    }
}
