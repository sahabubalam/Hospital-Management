<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employeeleave;
use App\Models\Employee;
use DB;

class EmployeeLeaveController extends Controller
{
    //employeeLeaveList

    public function  employeeLeaveList()
    {
        $leaveemp=DB::table('employeeleaves')
        ->join('employees','employeeleaves.employee_id','employees.id')
        ->select('employeeleaves.*','employees.first_name','employees.photo','employees.role')
        ->get();
        return view('employee-leave-list',compact('leaveemp'));
    }
    //addEmployeeLeaveList
    public function addEmployeeLeaveList()
    {
        $employees=Employee::all();
        return view('add-employee-leave',compact('employees'));
    }
    //store leave

    public function store(Request $request)
    {
        $leave=new Employeeleave();
        $leave->leave_type=$request->leave_type;
        $leave->employee_id=$request->employee_id;
        $leave->from=$request->from;
        $leave->to=$request->to;
        $leave->no_of_days=$request->no_of_days;
        $leave->status=$request->status;
        $leave->leave_reason=$request->leave_reason;
       // return response()->json($leave);
       $leave->save();
        return back()->with('employee_leave','Employee application inserted successfully');
    }
}
